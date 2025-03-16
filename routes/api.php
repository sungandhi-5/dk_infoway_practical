<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [ApiController::class,'postLogin'])->name('post_login');

Route::group(['middleware' =>  ['auth:sanctum'],'prefix' => 'user'], function () {
    Route::post('/stock/list', [ApiController::class,'postStockList'])->name('dashboard.stock.list');
    Route::post('/stock/add', [ApiController::class,'postStockAdd'])->name('post.stock.add');
    Route::post('/logout', [ApiController::class,'postLogout'])->name('post.logout');
});