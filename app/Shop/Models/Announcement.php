<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    // 資料表名稱
    protected $table = 'announcements';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected $fillable = [
        'title',
        'content',
        'start_date',
        'end_date',
        'is_active', 
    ];
}
