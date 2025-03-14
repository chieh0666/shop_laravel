<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    // 資料表名稱
    protected $table = 'merchandise';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected $fillable = [
        'category_id',
        'status',
        'name',
        'name_en',
        'introduction',
        'introduction_en',
        'photo',
        'price',
        'remain_count',
    ];
}