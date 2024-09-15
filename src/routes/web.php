<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\MiddlewareController;

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

// Fortify routes
Fortify::loginView(function () {
    return view('auth.login'); // ログイン画面へのビューを設定
});

Fortify::registerView(function () {
    return view('auth.register'); // 登録画面へのビューを設定
});

// 認証不要なルート
Route::get('/', [AuthController::class, 'home']);  // 認証不要に変更

// 認証不要な他のルート
Route::get('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::get('/contacts', [ContactController::class, 'store']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/middleware', [MiddlewareController::class, 'index']);
Route::post('/middleware', [MiddlewareController::class, 'post'])->middleware('first');
