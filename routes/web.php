<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
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

    Route::get('/login', 'login')->name('login');
    Route::get('/home', 'home')->name('home');

    Route::get('/token', 'token')->name('token')->middleware('authToken');

});
// ->middleware(AuthToken::class)
// ->middleware('authToken')