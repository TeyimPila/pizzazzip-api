<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Ingredient;

class IngredientService
{

    function create(Ingredient $ingredient): Ingredient
    {
        try {
            $ingredient->save();
            return $ingredient;
        } catch (\Exception $exception) {
        }

        return null;
    }
}
