<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Nếu bạn không đặt tên bảng theo chuẩn số nhiều, hãy khai báo $table
    // protected $table = 'products';

    // Khai báo các trường có thể fill dữ liệu
    // app/Models/Product.php
    protected $fillable = ['name', 'price', 'image'];

}
