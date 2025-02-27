<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function SignUpPage()
    {
        if (session()->has('member')) {
            return redirect('/');
        }

        $blinding = [
            'title' => '註冊-',
            'pageTitle' => '建立帳戶'
        ];

        return view('auth.signup', $blinding);
    }

    public function SigninPage()
    {
        if (session()->has('member')) {
            return redirect('/');
        }
        
        $blinding = [
            'title' => '登入-',
            'pageTitle' => '登入帳號'
        ];

        return view('auth.signin', $blinding);
    }

    public function SignupProcess()
    {
        $input = request()->all();

        if (Member::all()->count() === 0) {
            $input['account_type'] = 'A';
        }

        if (empty($input['last_name'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入姓氏'])->withInput();
        } else if (empty($input['first_name'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入名字'])->withInput();
        } else if (empty($input['email'])) {
            return redirect('/user/auth/signup')->witherrors(['請輸入電子郵件地址'])->withInput();
        } else if (Member::where('email', $input['email'])->count() > 0){
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
            Member::create($input);
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
            $member = Member::where('email', $input['email'])->first();
            if (empty($member)) {
                return redirect('/user/auth/signin')->witherrors(['此電子郵件地址尚未註冊'])->withInput();
            } else if (!Hash::check($input['password'], $member->password)) {
                return redirect('/user/auth/signin')->witherrors(['密碼錯誤'])->withInput();
            } else {
                session()->put('member_id', $member['id']);
                $member_id = session()->get('member_id');
                if (isset($input['rememberMe'])) {
                    $token = Str::random(60);
                    Member::where('id', $member_id)->update([
                        'remember_token' => hash('sha256', $token),
                    ]);
                    Cookie::queue('remember_me', $token, 525600);
                }
                return redirect('/');
            }
        }
    }

    public function SignOut()
    {
        if (Cookie::has('remember_me')) {
            $cookieToken = Cookie::get('remember_me');
    
            // 清除資料庫內的 Token
            $member_id = session()->get('member_id');
            if ($member_id) {
                Member::where('id', $member_id)->update([
                    'remember_token' => null
                ]);
            }
    
            // 刪除 Cookie
            Cookie::queue(Cookie::forget('remember_me'));
        }

        session()->forget('member_id');
        return redirect('/');
    }
}
