<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public static function getLogin(){
        $view = [
            'header'=>[
                'title' => 'Login | '.config('constant.PLATFORM_NAME')
            ],
            'body'=>[],
            'footer'=>[]
        ];
        return view('auth.login',$view);
    }
}
