<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\AuthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::controller(IndexController::class)->group(function () {
    Route::post('/items-menu', 'menuItems');
    Route::post('/category-products', 'categoryProducts');
    Route::post('/products', 'products');
    Route::post('/brands-product', 'brandsItems');
    Route::post('/all-info-products', 'allInfoProducts');
    Route::post('/relevance-product', 'relevanceProduct');
    Route::post('/brands', 'brands');
    Route::post('/product', 'product');
});


Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'registerUser')->name('auth.RegisterUser');
    Route::post('/auth', 'authUser')->name('auth.LoginUser');
    Route::post('/token', 'tokenUser')->name('auth.TokenUser')->middleware(AuthToken::class);
});
Route::controller(AdminController::class)->group(function () {
    Route::post('/admin', 'authAdmin')->name('auth.LoginAdmin');
    Route::post('/token', 'tokenUser')->name('auth.TokenUser')->middleware(AuthToken::class);
});

Route::post('/ads', function(Request $request){
    return $request->x;
})->middleware(AuthToken::class);



// Route::get('/token', function(){

//     $user = App\Models\User::where('email', 'test@example.com')->first();
//     $token = $user->createToken('my_token');
//     dd($token);

//     /*
//     $user->password = Hash::make('123');
//     $user->save();*/
// });








