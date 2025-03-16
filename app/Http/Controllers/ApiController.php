<?php

namespace App\Http\Controllers;

use App\Lib\General;
use App\Lib\Validation;
use App\Models\Stock;
use App\Models\StoreBranch;
use Illuminate\Http\Request;
use App\Models\User;


class ApiController extends Controller
{
    public static function postLogin(){
        $param = \Input::all();

        $validator = \Validator::make($param, Validation::get_rules("api", "login"));
        if ($validator->fails()) {
            $err_msg = $validator->errors()->first();
            return General::error_res($err_msg);
        }

        $user = User::where('email',$param['email'])->first();
        if(!$user){
            return General::error_res('Invalid credencials,please check email or password.');
        }
        if(!\Hash::check($param['password'], $user->password)){
            return General::error_res('Invalid credencials,please check email or password.');
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return General::success_res('Login successful.',array('token'=>$token));
    }
    
    public static function postStockList(){
        $param = \Input::all();


        $pageNumber = ( $param['start'] / $param['length'] )+1;
        $pageLength = $param['length'];
        $skip       = ($pageNumber-1) * $pageLength;
        $orderColumnIndex = $param['order'][0]['column'] ?? '0';
        $orderBy = $param['order'][0]['dir'] ?? 'desc';
        $orderByName = 'stock_id';

        switch($orderColumnIndex){
            case '0':
                $orderByName = 'stock_id';
                break;
            case '1':
                $orderByName = 'item_code';
                break;
            case '2':
                $orderByName = 'item_name';
                break;
            case '3':
                $orderByName = 'quantity';
                break;
            case '4':
                $orderByName = 'location';
                break;
            case '5':
                $orderByName = 'store_name';
                break;
            case '6':
                $orderByName = 'in_stock_date';
                break;
        
        }

        
        $query = Stock::with('store')->skip($skip)->take($pageLength);
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsTotal = $query->count();
        $stockData = $query->get()->toArray();
        return ['data'=>$stockData,'recordsTotal'=>$recordsTotal,'recordsFiltered'=>$recordsTotal];

        return $param;
    }
    public static function postStockAdd(){
        $param = \Input::all();
        unset($param['_token']);

        
        $validation_name = [
            'entries.*.item_code'=>'item code',
            'entries.*.item_name'=>'item name',
            'entries.*.quantity'=>'quantity',
            'entries.*.location'=>'location',
            'entries.*.store_name'=>'Store name',
            'entries.*.in_stock_date'=>'in stock date'
        ];
        // $validator = \Validator::make($param, \Validation::get_rules("site", "add_stock"),$custome_msg);
        // $validator->setAttributeNames($niceNames); 
        $validator = Validation::custom_validate($param, Validation::get_rules("api", "add_stock"),[],$validation_name);
        if($validator['flag'] != 1){
            return General::error_res($validator['msg']);
        }
        
        $response = Stock::insert($param['entries']);
        return General::success_res('Stock insert successfully.');
    }

    public static function postLogout(Request $request)
    {

        $user = $request->user();
        $user->currentAccessToken()->delete();
        return General::success_res('Success');
    }
}
