<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ShopController;
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

Route::group(['prefix' => '/'], function () {

    Route::get('', [ShopController::class, 'index']);

    Route::group(['prefix' => 'detail'], function () {
        Route::get('{shopId}', [ShopController::class, 'detail']);
        Route::post('{shopId}/reserve', [ShopController::class, 'reserve']);
    });

    Route::get('search', [ShopController::class, 'search']);
});

Route::middleware('guest')->group(function () {
    Route::post('thanks', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::get('mypage', [UserController::class, 'index']);

    Route::group(['prefix' => 'reserve'], function() {
        Route::post('create', [ReserveController::class, 'store']);
        Route::post('delete', [ReserveController::class, 'destroy']);
    });

    Route::group(['prefix' => 'favorite'], function() {
        Route::post('create', [FavoriteController::class, 'store']);
        Route::post('delete', [FavoriteController::class, 'destroy']);
    });
});

require __DIR__ . '/auth.php';
