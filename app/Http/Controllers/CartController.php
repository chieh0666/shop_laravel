<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function CartListPage()
    {
        if(session()->has('member_id')) {
            $member_id = session()->get('member_id');
            $cartItems = Cart::where('user_id', $member_id)->orderBy('created_at', 'desc')->get();
            $merchandises = Merchandise::all();
        } else {
            return redirect('/user/auth/signin');
        }

        $blinding = [
            'title' => '我的購物車-',
            'pageTitle' => '我的購物車',
            'cartItems' => $cartItems,
            'merchandises' => $merchandises,
        ];
        return view('cart', $blinding);
    }

    public function addToCartProcess()
    {
        $toCartItemId = request()->input('toCartItem');

        $merchandise = Merchandise::findOrFail($toCartItemId);
        
        $member_id = session()->get('member_id');
        
        $cartItem = Cart::where('user_id',  $member_id)
        ->where('merchandise_id', $toCartItemId)
        ->first();
        
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $member_id,
                'merchandise_id' => $toCartItemId,
                'quantity' => 1,
            ]);
        }

        return response()->json([
            'status' => 1,
            'msg' => '商品已加入購物車！',
            'toCartItemId' => $toCartItemId,
        ]);
    }

    public function getCartData()
    {
        $member_id = session()->get('member_id');

        $cartItemCount = Cart::where('user_id',  $member_id)->sum('quantity');

        return response()->json([
            'status' => 1,
            'msg' => '購物車資料',
            'cartItemCount' => $cartItemCount,
        ]);
    }
}
