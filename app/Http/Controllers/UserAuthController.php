<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function SignUpPage()
    {
        if (session()->has('user_id')) {
            return redirect('/');
        }

        $blinding = [
            'title' => '註冊 - ',
            'pageTitle' => '建立帳戶'
        ];

        return view('auth.signup', $blinding);
    }

    public function SigninPage()
    {
        if (session()->has('user_id')) {
            return redirect('/');
        }
        
        $blinding = [
            'title' => '登入 - ',
            'pageTitle' => '登入帳號'
        ];

        return view('auth.signin', $blinding);
    }

    public function SignupProcess()
    {
        $input = request()->all();

        if (User::all()->count() === 0) {
            $input['account_type'] = 'A';
        }

        if (empty($input['last_name'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入姓氏'])->withInput();
        } else if (empty($input['first_name'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入名字'])->withInput();
        } else if (empty($input['email'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入電子郵件地址'])->withInput();
        } else if (User::where('email', $input['email'])->count() > 0){
            return redirect('/user/auth/signup')->witherrors(['此電子郵件地址已被註冊'])->withInput();
        } else if (empty($input['password'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入密碼'])->withInput();
        } else if (strlen($input['password']) < 8 || strlen($input['password']) > 20) {
            return redirect('/user/auth/signup')->witherrors(['密碼只能8-20字元'])->withInput();
        } else if ($input['password'] !== $input['password_confirm']) {
            return redirect('/user/auth/signup')->witherrors(['密碼不一致'])->withInput();
        } else {
            $input['password_confirm'] = Hash::make($input['password_confirm']);
            $input['password'] = Hash::make($input['password']);
            User::create($input);
            return redirect('/user/auth/signin');
        }
    }

    public function SigninProcess()
    {
        $input = request()->all();
        
        if(empty($input['email'])) {
            return redirect('/user/auth/signin')->witherrors(['請輸入電子郵件地址'])->withInput();
        } else if (empty($input['password'])) {
            return redirect('/user/auth/signin')->witherrors(['請輸入密碼'])->withInput();
        } else {
            $user = User::where('email', $input['email'])->first();
            if (empty($user)) {
                return redirect('/user/auth/signin')->witherrors(['此電子郵件地址尚未註冊'])->withInput();
            } else if (!Hash::check($input['password'], $user->password)) {
                return redirect('/user/auth/signin')->witherrors(['密碼錯誤'])->withInput();
            } else {
                session()->put('user_id', $user['id']);
                return redirect('/');
            }
        }
    }

    public function SignOut()
    {
        session()->forget('user_id');
        return redirect('/');
    }
}
