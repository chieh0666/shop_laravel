<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Shop\Models\User;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layout.header', function ($view) {
            $user = null;

            if (session()->has('user_id')) {
                $user = User::find(session('user_id'));
            }

            // 將使用者資料傳遞到 View
            $view->with('user', $user);
        });
    }
}
