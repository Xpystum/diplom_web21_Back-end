<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminWidgetsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Broadcasting\BroadcastingAuthController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Middleware\AuthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\password;



Route::controller(IndexController::class)->group(function () {
    Route::post('/items-menu', 'menuItems');
    Route::post('/category-products', 'categoryProducts');
    Route::post('/brands-product', 'brandsItems');
    Route::post('/all-info-products', 'allInfoProducts');
    Route::post('/relevance-product', 'relevanceProduct');
    

    Route::post('/products', 'products');
    Route::post('/brands', 'brands');
    Route::post('/users', 'users');
    Route::get('/widgets', 'widgets');

    Route::post('/user', 'user');
    Route::post('/product', 'product');
    Route::post('/addproduct', 'addproduct');
    
    Route::post('/models', 'models');
    Route::post('/body-type', 'bodyType');
    Route::post('/fuel', 'fuel');
    Route::post('/transmission', 'transmission');
    Route::post('/drive-unit', 'driveUnit');


    
});

Route::controller(ReviewController::class)->group(function () {

    Route::post('/reviews', 'reviews');
    Route::post('/review', 'review');
    Route::post('/all-info-reviews', 'allInfoReviews');
    Route::post('/add-review', 'addReview');
    Route::post('/add-review-img', 'addReviewImg');
    Route::post('/save-img', 'saveImg');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'registerUser')->name('auth.RegisterUser');
    Route::post('/auth', 'authUser')->name('auth.LoginUser');
    Route::post('/token', 'tokenUser')->name('auth.TokenUser')->middleware(AuthToken::class);
});

Route::middleware(AuthToken::class)->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/add-favorite', 'addFavorite')->name('add-favorite');
        Route::post('/remove-favorite', 'removeFavorite')->name('remove-favorite');
        Route::post('/favorites-user', 'favoritesUser')->name('favorites-user');
        Route::post('/favorites-sinc', 'favoritesSinc')->name('favorites-sinc');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::post('/store', 'store')->name('store');
    });
});


Route::post('/ads', function(Request $request){
    return $request->x;
})->middleware(AuthToken::class);


// Chat
Route::controller(ChatController::class)->group(function(){

    Route::get('/chat', 'index')->name('chat');

    Route::post('/chat/messages', 'messages')->name('chat.messages');

    Route::post('/chat/send', 'send');

    Route::post('/chat/allgroup', 'allChatGroupUser');

    Route::post('/chat/observgroupnew', 'returnNewGroupChat');

})->middleware('tokenAuth');


//авторизация приватного канала
Route::post('/custom/broadcasting/auth', [BroadcastingAuthController::class, 'authenticate']);





