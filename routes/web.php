<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUserAdminMiddleware;

Route::get('/',
    'App\Http\Controllers\HomeController@home')->name('home');

Route::get('/search',
    'App\Http\Controllers\SearchController@index');


Route::get('/promotion', function(){
    return view('promotion');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact-us', function(){
    return view('contact-us');
});

// 使用者
Route::group(['prefix' => 'user'], function(){
    Route::get(
        'manage',
        'App\Http\Controllers\UserController@UserManagePage'
    );
    Route::get(
        '{user_id}/edit',
        'App\Http\Controllers\UserController@UserEditPage'
    );
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

// 商品
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
        'all',
        'App\Http\Controllers\MerchandiseController@MerchandisePage'
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

// 分類
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

// 公告
Route::group(['prefix' => 'announcement'], function(){
    Route::get(
        'manage',
        'App\Http\Controllers\AnnouncementController@AnnouncementManagePage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        'create',
        'App\Http\Controllers\AnnouncementController@AnnouncementCreateProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        '{announcement_id}/edit',
        'App\Http\Controllers\AnnouncementController@AnnouncementEditPage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::post(
        '{announcement_id}/edit',
        'App\Http\Controllers\AnnouncementController@AnnouncementEditProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::delete(
        '{announcement_id}/delete',
        'App\Http\Controllers\AnnouncementController@AnnouncementDeleteProcess'
    )->middleware(AuthUserAdminMiddleware::class);
});

// 新聞、最新消息
Route::group(['prefix' => 'news'], function(){
    Route::get(
        'manage',
        'App\Http\Controllers\NewsController@NewsManagePage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        'create',
        'App\Http\Controllers\NewsController@NewsCreateProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        '{news_id}/edit',
        'App\Http\Controllers\NewsController@NewsEditPage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::post(
        '{news_id}/edit',
        'App\Http\Controllers\NewsController@NewsEditProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::delete(
        '{news_id}/delete',
        'App\Http\Controllers\NewsController@NewsDeleteProcess'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        '/',
        'App\Http\Controllers\NewsController@NewsPage'
    );
    Route::get(
        'detail/{news_id}',
        'App\Http\Controllers\NewsController@NewsDetailPage'
    );
});

// 購物車
Route::group(['prefix' => 'cart'], function(){
    Route::get(
        'list',
        'App\Http\Controllers\CartController@CartPage'
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
    Route::put(
        '{cart_id}/edit',
        'App\Http\Controllers\CartController@CartContentEditProcess'
    );
});

// 訂單
Route::group(['prefix' => 'order'], function(){
    Route::get(
        'manage',
        'App\Http\Controllers\OrderController@OrderManagePage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::get(
        '{order_id}/edit',
        'App\Http\Controllers\OrderController@OrderEditPage'
    )->middleware(AuthUserAdminMiddleware::class);
    Route::post(
        '{order_id}/edit',
        'App\Http\Controllers\OrderController@OrderEditProcess'
    )->middleware(AuthUserAdminMiddleware::class);
});

// 結帳
Route::group(['prefix' => 'checkout'], function(){
    Route::post(
        '/confirm',
        'App\Http\Controllers\CheckoutController@CheckOutPage'
    );
    Route::post(
        '/',
        'App\Http\Controllers\CheckoutController@CheckOutProcess'
    );
});
Route::get(
    'pay',
    'App\Http\Controllers\CheckoutController@sendOrder'
);

// google auth 登入
Route::get('/google/auth',
    'App\Http\Controllers\SocialiteController@redirectToProvider');
Route::get('/google/auth/callback',
    'App\Http\Controllers\SocialiteController@handleProviderCallback');
    