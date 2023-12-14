<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AdminController::class)->group(function () {

    Route::get('/', 'auth')->name('auth');

    Route::get('/login', 'showLoginForm')->name('login');
    Route::get('/home', 'home')->name('home');
    Route::get('/widgets', 'widgets')->name('widgets');
    Route::get('/database', 'database')->name('database');
    Route::get('/products', 'products')->name('products');


    Route::get('/test', 'test')->name('test');





    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/check-user', 'checkUser')->name('checkUser');

});
// ->middleware(AuthToken::class)
// ->middleware('authToken')