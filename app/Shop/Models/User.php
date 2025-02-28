<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 資料表名稱
    protected $table = 'users';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected $fillable = [
      'email',
      'phone',
      'password',
      'last_name',
      'first_name',
      'photo',
      'gender',
      'nickname',
      'account_type',
    ];
}
