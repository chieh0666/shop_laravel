<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 資料表名稱
    protected $table = 'orders';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'shipping_address',
        'payment_method',
        'shipping_method',
        'company_name',
        'notes',
        'order_status',
        'invoice_type',
        'invoice_carrier',
    ];
}
