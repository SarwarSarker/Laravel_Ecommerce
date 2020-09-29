<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    public $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
        'image'
    ];
}
