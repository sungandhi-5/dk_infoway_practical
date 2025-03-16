<?php

namespace App\lib;

use App\Lib\General;

class Validation
{
    private static $rules = array(
        "api" => [
            'add_stock' => [
                'entries' => 'required|array',
                'entries.*.item_code' => 'required|string',
                'entries.*.item_name' => 'required|string',
                'entries.*.quantity' => 'required|integer|min:1',
                'entries.*.location' => 'required|string',
                'entries.*.store_id' => 'required|integer|in:1,2,3,4',
                'entries.*.in_stock_date' => 'required|date',
            ],
            'login' => [
                'email' => 'required|email',
                'password' => 'required',
            ],
        ],
    );

    public static function get_rules($type, $rules_name)
    {
        if (isset(self::$rules[$type][$rules_name]))
            return self::$rules[$type][$rules_name];
        return array();
    }

    public static function validate($type, $rule_name, $custom_msg = [], $args_param = [], $niceNames = [])
    {

        $rules = self::get_rules($type, $rule_name);

        if (count($args_param) > 0) {
            $param = $args_param;
        } else {
            $param = \Input::all();
        }

        if (count($custom_msg) > 0) {
            $validator = \Validator::make($param, $rules, $custom_msg);
        } else {
            $validator = \Validator::make($param, $rules);
        }
        $validator->setAttributeNames($niceNames);

        if ($validator->fails()) {
            $error = $validator->messages()->all();
            $msg = isset($error[0]) ? $error[0] : "Please fill in the required field.";
            $json = \General::error_res($msg);
            $json['data'] = [$msg];
            return $json;
        }

        return \General::success_res();
    }

    public static function custom_validate($param, $rules, $custom_msg = [], $custom_names = [], $sometimes = [])
    {
        $json = [];
        if (count($custom_msg) > 0) {
            $validator = \Validator::make($param, $rules, $custom_msg);
        } else {
            $validator = \Validator::make($param, $rules);
        }
        if (!empty($sometimes)) {
            foreach ($sometimes as $some) {
                if (isset($some['field']) && isset($some['rules']) && isset($some['callback'])) {
                    $validator->sometimes($some['field'], $some['rules'], $some['callback']);
                }
            }
        }

        if (!empty($custom_names)) {
            $validator->setAttributeNames($custom_names);
        }
        if ($validator->fails()) {
            $error = $validator->messages()->all();
            $msg = isset($error[0]) ? $error[0] : "Please fill in the required field.";
            $json = General::validation_error_res($msg);
            $json['data'] = [$msg];
            return $json;
        }
        $json = General::success_res();
        return  $json;
    }
}
