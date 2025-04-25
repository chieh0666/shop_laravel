<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function UserEditProcess($user_id)
    {
        $input = request()->all();
        $user = User::findOrFail($user_id);

        if ($input['password']) {
            $user->password = Hash::make($input['password']);
            $user->save();
        }

        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->account_type = $input['account_type'];
        $user->nickname = $input['nickname'];
        $user->phone = $input['phone'];
        $user->gender = $input['gender'];
        $user->save();
        
        return redirect('/user/' . $user_id . '/edit')->with('success', '使用者更新成功');
    }

    public function UserDeleteProcess($user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user->photo) {
            $photoPath = public_path($user->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        User::destroy($user_id);
        
        return redirect('/user/manage')->with('success', '使用者已刪除');
    }

    public function UserCreateProcess()
    {
        $user_data = [
            'email' => 'new_person@mail.com',
            'password' => Hash::make('12345678'),
            'last_name' => '姓氏',
            'first_name' => '名字',
            'account_type' => 'U',
        ];

        $user = User::create($user_data);

        if (is_null(User::find($user->id))) {
            return redirect('/user/manage')->with('error', '使用者新增失敗');
        } else {
            return redirect('/user/' . $user->id . '/edit');
        }
    }
}
