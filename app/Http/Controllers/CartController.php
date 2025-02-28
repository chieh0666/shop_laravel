<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Merchandise;
use App\Shop\Models\User;
use App\Shop\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function CartListPage()
    {
        if(session()->has('user_id')) {
            $user_id = session()->get('user_id');
            $cartItems = Cart::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
            $merchandises = Merchandise::all();
        } else {
            return redirect('/user/auth/signin');
        }

        $blinding = [
            'title' => '我的購物車 - ',
            'pageTitle' => '購物車內容',
            'cartItems' => $cartItems,
            'merchandises' => $merchandises,
        ];
        return view('cart', $blinding);
    }

    public function addToCartProcess()
    {
        $toCartItemId = request()->input('toCartItem');

        $merchandise = Merchandise::findOrFail($toCartItemId);
        
        $user_id = session()->get('user_id');
        
        $cartItem = Cart::where('user_id',  $user_id)
        ->where('merchandise_id', $toCartItemId)
        ->first();
        
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'merchandise_id' => $toCartItemId,
                'quantity' => 1,
            ]);
        }

        return response()->json([
            'msg' => '商品已加入購物車！',
            'toCartItemId' => $toCartItemId,
        ]);
    }

    public function CartDeleteProcess($cart_id)
    {
        $cartItem = Cart::find($cart_id);
        $cartItem->delete();

        return response()->json([
            'msg' => '商品已刪除！',
        ]);
    }

    public function getCartData()
    {
        $user_id = session()->get('user_id');

        $cartItemCount = Cart::where('user_id',  $user_id)->sum('quantity');

        return response()->json([
            'cartItemCount' => $cartItemCount,
        ]);
    }
}
