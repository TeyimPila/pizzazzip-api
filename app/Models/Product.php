<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'type', 'description', 'image'];

    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }
}
