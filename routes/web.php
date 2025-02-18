<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
            return view('layout.home');
        })->name('home');

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
    
});