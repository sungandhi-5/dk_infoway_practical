<?php

namespace App\Http\Controllers;

use App\Models\StoreBranch;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function getUserDashboard()
    {
        $view = [
            'header' => [
                'title' => 'Dashboard | ' . config('constant.PLATFORM_NAME')
            ],
            'body' => [],
            'footer' => [
                "js" => ['/js/datatable.min.js','/js/dashboard.min.js']
            ]
        ];
        return view('user.dashboard', $view);
    }

    public static function getStockAdd()
    {

        $stores = StoreBranch::where('status',1)->get()->toArray();
        $storeConfig = [];
        foreach ($stores as $value) {
            array_push($storeConfig,array('id'=>$value['store_id'],'name'=>$value['store_name']));
        }
        $view = [
            'header' => [
                'title' => 'Stock Add | ' . config('constant.PLATFORM_NAME')
            ],
            'body' => [
                'storeConfig' => json_encode($storeConfig)
            ],
            'footer' => [
                "js" => ['/js/ag-grid.min.js','/js/stock-add.min.js']
            ]
        ];
        return view('user.stock-add', $view);
    }
}
