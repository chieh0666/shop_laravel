<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Merchandise;
use App\Shop\Models\Order;
use App\Shop\Models\OrderDetail;
use App\Shop\Models\User;

class OrderController extends Controller
{
  public function OrderManagePage()
  {
    $users = User::select('id', 'last_name', 'first_name')->get();
    $orders = Order::orderBy('created_at', 'desc')->get();

    $blinding = [
      'title' => '訂單管理 - ',
      'page_title' => '訂單管理',
      'users' => $users,
      'orders' => $orders,
    ];

    return view('order.manage', $blinding);
  }

  public function OrderEditPage($order_id)
  {
    $order = Order::where('id', $order_id)->first();
    $user = User::where('id', $order->user_id)->first();
    $order_details = OrderDetail::where('order_id', $order_id)->get();
    $merchandises = Merchandise::select('id', 'name', 'price')->get();
    
    $blinding = [
      'title' => '訂單內容 - ',
      'page_title' => '訂單內容',
      'order' => $order,
      'user' => $user,
      'order_details' => $order_details,
      'merchandises' => $merchandises,
    ];

    return view('order.edit', $blinding);
  }

  public function OrderEditProcess($order_id)
    {
      $input = request()->all();
      unset($input['_token']);
      $order = Order::where('id', $order_id)->update($input);

      return redirect('/order/' . $order_id . '/edit')->with('success', '更新訂單成功');
    }
}
