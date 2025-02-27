<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Member;

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
            $member = null;

            if (session()->has('member_id')) {
                $member = Member::find(session('member_id'));
            }

            // 將會員資料傳遞到 View
            $view->with('member', $member);
        });
    }
}
