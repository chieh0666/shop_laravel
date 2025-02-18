<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function SignUpPage()
    {
        $blinding = [
            'title' => '-註冊',
            'pageTitle' => '建立帳戶'
        ];
        return view('auth.signup', $blinding);
    }

    public function SigninPage()
    {
        $blinding = [
            'title' => '-登入',
            'pageTitle' => '登入帳號'
        ];
        return view('auth.signin', $blinding);
    }

    public function SignupProcess()
    {
        $input = request()->all();
        
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
        } else if ($input['password'] !== $password_confirm = $input['password_confirm']) {
            return redirect('/user/auth/signup')->witherrors(['密碼不一致'])->withInput();
        } else {
            $input['password'] = Hash::make($input['password']);
            User::create($input);
            return redirect('/user/auth/signin');
        }
    }
}
