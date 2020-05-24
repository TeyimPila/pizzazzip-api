<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Ingredient;

class IngredientService
{

    /**
     * Saves the given instance of Ingredient to the database.
     *
     * @param Ingredient $ingredient
     *
     * @return Ingredient
     */
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
