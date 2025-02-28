<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // 資料表名稱
    protected $table = 'carts';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected $fillable = [
        'user_id',
        'merchandise_id',
        'quantity', 
    ];
}
