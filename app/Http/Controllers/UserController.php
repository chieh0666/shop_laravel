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
            'title' => '使用者管理 - ',
            'page_title' => '使用者管理',
            'users' => $users,
        ];

        return view('user.manage', $blinding);
    }

    public function UserEditPage($user_id)
    {
        $user = User::findOrFail($user_id);

        $blinding = [
            'title' => '使用者編輯 - ',
            'page_title' => '使用者編輯',
            'user' => $user,
        ];

        return view('user.edit', $blinding);
    }
}
