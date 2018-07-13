<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //设置可以批量添加值的字段
    protected $fillable = [
        'name', 'description',
    ];
}
