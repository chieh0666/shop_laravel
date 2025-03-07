<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Cart;
use App\Shop\Models\Merchandise;
use App\Shop\Models\Order;
use App\Shop\Models\OrderDetail;

class OrderController extends Controller
{
    public function CheckOutPage()
    {
        if (session()->has('user_id')) {
            $user_id = session()->get('user_id');
        } else {
            return redirect('/user/auth/signin');
        }

        $input = request()->all();

        if (empty($input['cartCheck'])) {
            return '請至少選取一個項目！';
        }

        $selectedItems = Merchandise::whereIn('id', $input['cartCheck'])->get();
        
        $checkoutData = [];
        foreach ($input['cartCheck'] as $index => $merchandiseId) {
            $quantity = $input['quantity'][$index] ?? 1;
            $merchandise = $selectedItems->firstWhere('id', $merchandiseId);
            if ($merchandise) {
                $checkoutData[] = [
                    'merchandise_id' => $merchandise->id,
                    'photo' => $merchandise->photo,
                    'name' => $merchandise->name,
                    'price' => $merchandise->price,
                    'quantity' => $quantity,
                    'subtotal' => $merchandise->price * $quantity,
                ];
            }
        }

        $blinding = [
            'title' => '結帳 - ',
            'pageTitle' => '結帳',
            'checkoutData' => $checkoutData,
            'totalAmount' => array_sum(array_column($checkoutData, 'subtotal'))
        ];

        return view('checkout', $blinding);
    }

    public function CheckOutProcess()
    {
        if (session()->has('user_id')) {
            $user_id = session()->get('user_id');
        } else {
            return redirect('/user/auth/signin');
        }

        $input = request()->all();

        if (empty($input)) {
            return '無效訂單!';
        }

        $merchandiseIds = $input['merchandise_id'];
        $quantities = $input['quantity'];
        $prices = [];
        $subtotals = [];
        foreach ($merchandiseIds as $index => $merchandiseId) {
            $merchandise = Merchandise::findOrFail($merchandiseId);
            $prices[$index] = $merchandise->price;
            $subtotals[$index] = $merchandise->price * $quantities[$index];
        }
        $total_amount = array_sum($subtotals);

        // 建立訂單
        $order = Order::create([
            'user_id' => $user_id,
            'order_number' => $this->generateOrderNumber($user_id),
            'total_amount' => $total_amount,
            'shipping_address' => $input['shipping_method'] !== 'pickup' ? $input['shipping_address'] : '來店自取',
            'payment_method' => $input['payment_method'],
            'shipping_method' => $input['shipping_method'],
            'company_name' => $input['invoice_type'] === 'company' ? $input['company_name'] : null,
            'notes' => htmlspecialchars($input['notes']),
            'invoice_type' => $input['invoice_type'],
            'invoice_carrier' => $input['invoice_carrier'],
        ]);

        // 存入訂單明細並清空購物車商品
        foreach ($merchandiseIds as $index => $merchandiseId) {
            OrderDetail::create([
                'order_id' => $order->id,
                'merchandise_id' => $merchandiseId,
                'price' => $prices[$index],
                'quantity' => $quantities[$index],
            ]);
            $this->clearCartItems($user_id, $merchandiseId);
        }
    }

    private function generateOrderNumber($user_id)
    {
        $date = now()->format('Ymd'); // 日期
        $userCode = str_pad($user_id, 4, '0', STR_PAD_LEFT); // 使用者 ID 補滿 4 位
        $sequence = str_pad(Order::whereDate('created_at', now()->toDateString())->count() + 1, 4, '0', STR_PAD_LEFT);
        return "{$date}{$userCode}{$sequence}";
    }

    private function clearCartItems($user_id, $merchandiseId)
    {
        Cart::where('user_id', $user_id)->where('merchandise_id', $merchandiseId)->delete();
    }
}
