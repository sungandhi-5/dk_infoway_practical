<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class,'getLogin'])->name('get.login')->middleware('check.token.notExists');


Route::group(['middleware' =>  ['check.token.exists'],'prefix' => 'user'], function () {
    Route::get('/dashboard', [UserController::class,'getUserDashboard'])->name('get.dashboard')->middleware('check.token.exists');
    Route::get('/stock/add', [UserController::class,'getStockAdd'])->name('get.stock.add')->middleware('check.token.exists');
});


