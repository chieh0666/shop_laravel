<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Cart;
use App\Shop\Models\Merchandise;

class OrderController extends Controller
{
    public function CheckOutPage()
    {
        $input = request()->all();

        if (session()->has('user_id')) {
            $user_id = session()->get('user_id');
        } else {
            return redirect('/user/auth/signin');
        }

        if (isset($input['cartCheck'])) {
            $checkOutItems = [
                'merchandise_id' => $input['cartCheck'],
                'quantity' => $input['quantity']
            ];
            dd($checkOutItems);
        } else {
            return '沒有商品可以結帳!';
        }

        $cartItems = Cart::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $merchandises = Merchandise::all();

        $blinding = [
            'title' => '結帳 - ',
            'pageTitle' => '結帳',
            'checkOutItems' => $checkOutItems,
            'merchandises' => $merchandises,
        ];
    }
}
