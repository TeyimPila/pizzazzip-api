<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'product_option_id',
        'order_id',
        'parent_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productOption()
    {
        return $this->belongsTo(ProductOption::class);
    }

    public function toppings()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function parent()
    {
        return $this->belongsTo(OrderItem::class);
    }

}
