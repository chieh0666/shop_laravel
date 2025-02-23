<?php

use Illuminate\Support\Facades\Route;

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
    );
    Route::get(
        'create',
        'App\Http\Controllers\MerchandiseController@MerchandiseCreateProcess'
    );
    Route::get(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditPage'
    );
    Route::post(
        '{merchandise_id}/edit',
        'App\Http\Controllers\MerchandiseController@MerchandiseEditProcess'
    );
    Route::delete(
        '{merchandise_id}/delete',
        'App\Http\Controllers\MerchandiseController@MerchandiseDeleteProcess'
    );
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
    );
    Route::get(
        'create',
        'App\Http\Controllers\CategoryController@CategoryCreateProcess'
    );
    Route::get(
        '{category_id}/edit',
        'App\Http\Controllers\CategoryController@CategoryEditPage'
    );
    Route::post(
        '{category_id}/edit',
        'App\Http\Controllers\CategoryController@CategoryEditProcess'
    );
    Route::delete(
        '{category_id}/delete',
        'App\Http\Controllers\CategoryController@CategoryDeleteProcess'
    );
});

Route::group(['prefix' => 'cart'], function(){
    Route::get(
        'list',
        'App\Http\Controllers\CartController@CartListPage'
    );
    Route::post(
        'add',
        'App\Http\Controllers\CartController@addToCartProcess'
    );
    Route::delete(
        '{category_id}/delete',
        'App\Http\Controllers\CategoryController@CategoryDeleteProcess'
    );
});

// google auth 登入
Route::get('/google/auth',
    'App\Http\Controllers\SocialiteController@redirectToProvider');
Route::get('/google/auth/callback',
    'App\Http\Controllers\SocialiteController@handleProviderCallback');