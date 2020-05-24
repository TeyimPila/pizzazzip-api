<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Ingredient;
use App\Models\Product;
use Exception;

class ProductService
{
    /** @var IngredientService  */
    private $ingredientService;

    function __construct(
        IngredientService $ingredientService
    ) {
        $this->ingredientService = $ingredientService;
    }

    function create(array $payload): Product
    {
        try {
            $product = Product::create($payload);

            if ($product->id && array_key_exists('ingredients', $payload)) {
                foreach ($payload['ingredients'] as $ingredient) {
                    $ingredient['product_id'] = $product->id;
                    $this->ingredientService->create(new Ingredient($ingredient));
                }
            }

            return $product;
        } catch (Exception $exception) {
        }

        return null;
    }

    /**
     * Updates the given product with the given attributes.
     *
     * @param Product $product
     * @param array   $attributes
     *
     * @return Product
     */
    public function update(Product $product, array $attributes): Product
    {
       $product->update($attributes);
       return $product;
    }
}
