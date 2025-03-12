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
    $order_details = OrderDetail::all();
    $merchandises = Merchandise::select('id', 'name')->get();

    $blinding = [
      'title' => '訂單管理 - ',
      'page_title' => '訂單管理',
      'users' => $users,
      'orders' => $orders,
      'order_details' => $order_details,
      'merchandises' => $merchandises
    ];

    return view('order.manage', $blinding);
  }
}
