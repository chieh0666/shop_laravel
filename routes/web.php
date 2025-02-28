<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUserAdminMiddleware;

Route::get('/',
    'App\Http\Controllers\HomeController@needForHome')->name('home');

Route::get('/search',
    'App\Http\Controllers\SearchController@index');


Route::get('/promotion', function(){
    return view('promotion');
});

Route::get('/news', function(){
    return view('news');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact-us', function(){
    return view('contact-us');
});

Route::group(['prefix' => 'user'], function(){
    Route::group(['prefix' => 'auth'], function(){
        Route::get(
            'signup',
            'App\Http\Controllers\UserAuthController@SignupPage'
        );
        Route::post(
            'signup',
            'App\Http\Controllers\UserAuthController@SignupProcess'
        );
        Route::get(
            'signin',
            'App\Http\Controllers\UserAuthController@SigninPage'
        );
        Route::post(
            'signin',
            'App\Http\Controllers\UserAuthController@SigninProcess'
        );
        Route::get(
            'signout',
            'App\Http\Controllers\UserAuthController@SignOut'
        );
    });
});

Route::group(['prefix' => 'merchandise'], function(){
    Route::get(
        'manage',
        'App\Http\Controllers\MerchandiseController@MerchandiseManagePage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        'create',
        'App\Http\Controllers\MerchandiseController@MerchandiseCreateProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditPage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::post(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::delete(
        '{merchandise_id}/delete',
        'App\Http\Controllers\MerchandiseController@MerchandiseDeleteProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        'list',
        'App\Http\Controllers\MerchandiseController@MerchandiseListPage'
    );
    Route::get(
        'new',
        'App\Http\Controllers\MerchandiseController@MerchandiseNewPage'
    );
    Route::get(
        '{merchandise_id}/detail',
        'App\Http\Controllers\MerchandiseController@MerchandiseDetailPage'
    );
    // 取得商品資料json
    Route::get(
        'getdata',
        'App\Http\Controllers\MerchandiseController@ReturnMerchandiseData'
    );
});

Route::group(['prefix' => 'category'], function(){
    Route::get(
        'manage',
        'App\Http\Controllers\CategoryController@CategoryManagePage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        'create',
        'App\Http\Controllers\CategoryController@CategoryCreateProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        '{category_id}/edit',
        'App\Http\Controllers\CategoryController@CategoryEditPage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::post(
        '{category_id}/edit',
        'App\Http\Controllers\CategoryController@CategoryEditProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::delete(
        '{category_id}/delete',
        'App\Http\Controllers\CategoryController@CategoryDeleteProcess'
    )->middleware(AuthUserAdminMiddleware::class);
});

Route::group(['prefix' => 'cart'], function(){
    Route::get(
        'list',
        'App\Http\Controllers\CartController@CartListPage'
    )->name('cart');
    Route::post(
        'add',
        'App\Http\Controllers\CartController@addToCartProcess'
    );
    Route::get(
        'getdata',
        'App\Http\Controllers\CartController@getCartData'
    );
    Route::delete(
        '{cart_id}/delete',
        'App\Http\Controllers\CartController@CartDeleteProcess'
    );
});

// google auth 登入
Route::get('/google/auth',
    'App\Http\Controllers\SocialiteController@redirectToProvider');
Route::get('/google/auth/callback',
    'App\Http\Controllers\SocialiteController@handleProviderCallback');