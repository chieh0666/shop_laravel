<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // 資料表名稱
    protected $table = 'order_details';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected $fillable = [
        'order_id',
        'merchandise_id',
        'quantity',
        'price',
    ];
}
