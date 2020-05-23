<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'product_id', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
