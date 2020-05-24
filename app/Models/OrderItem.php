<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItem extends Model
{
    protected $fillable = [
        'product_id',
        'order_id',
        'parent_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Defines a self many-to-many relationship
     * between an order item and its toppings.
     *
     * @return HasMany
     */
    public function toppings()
    {
        return $this->hasMany(OrderItem::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(OrderItem::class);
    }

}
