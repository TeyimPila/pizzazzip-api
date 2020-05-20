<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'pizza_id', 'description'];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
