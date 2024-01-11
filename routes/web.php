<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminWidgetsController;
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

    Route::put('/product/{id}/update-status', 'updateProductStatus')->name('update-product-status');
    Route::put('/user/{id}/update-user-status', 'updateUserStatus')->name('update-user-status');
    Route::put('/widgets/{id}/update-widget-status', 'updateWidgetStatus')->name('update-widget-status');

    Route::post('/product-queue', 'productQueue')->name('productQueue');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/check-user', 'checkUser')->name('checkUser');
});

Route::controller(AdminPagesController::class)->group(function () {
    
    Route::get('/home', 'home')->name('home');
    Route::get('/widgets', 'widgets')->name('widgets');
    Route::get('/database', 'database')->name('database');

    Route::get('/products/in_review', 'products')->name('products');
    Route::get('/products/approved', 'productsGreen')->name('productsGreen');
    Route::get('/products/rejected', 'productsRed')->name('productsRed');
    Route::get('/product/{id}', 'productCars')->name('product');
  
    Route::get('/user', 'user')->name('user');
    Route::get('/user/admin', 'userAdmin')->name('userAdmin');
    Route::get('/user/ban', 'userBan')->name('userBan');

    Route::get('/reviews', 'reviews')->name('reviews');

    Route::get('/null', 'null')->name('null');
    Route::get('/test', 'test')->name('test');
});

Route::controller(AdminWidgetsController::class)->group(function () {
    Route::get('/api/widgets', 'index'); // API для получения списка виджетов
    Route::put('/api/widgets/{id}', 'update'); // API для обновления позиции виджета
});