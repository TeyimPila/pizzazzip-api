<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'unit_price',
        'type',
        'description',
        'image',
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
