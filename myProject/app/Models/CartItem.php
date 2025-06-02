<?php

// app/Models/CartItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'name', 'price', 'quantity', 'image_url',
    ];
}

