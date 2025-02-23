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
        $blinding = [
            'title' => '我的購物車-',
            'pageTitle' => '我的購物車',
        ];
        return view('cart', $blinding);
    }

    public function addToCartProcess()
    {
        $toCartItemId = request()->input('toCartItem');

        $merchandise = Merchandise::findOrFail($toCartItemId);
        
        $userId = session()->get('user')->id;
        
        $cartItem = Cart::where('user_id',  $userId)
        ->where('merchandise_id', $toCartItemId)
        ->first();
        
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'merchandise_id' => $toCartItemId,
                'quantity' => 1,
            ]);
        }

        // 取得最新的購物車內容
        $cartItems = Cart::where('user_id', $userId)
        ->get();

        return response()->json([
            'status' => 1,
            'msg' => '商品已加入購物車！',
            'cart' => $cartItems,
        ]);
    }
}
