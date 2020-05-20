<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Product
{
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
