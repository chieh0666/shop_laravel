<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\User;

class UserController extends Controller
{
    public function UserManagePage()
    {
        $users = User::select('id', 'email', 'last_name', 'first_name', 'photo', 'account_type')->orderBy('created_at', 'desc')->get();
        
        $blinding = [
            'title' => '會員管理 - ',
            'page_title' => '會員管理',
            'users' => $users,
        ];

        return view('user.manage', $blinding);
    }
}
