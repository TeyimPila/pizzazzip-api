<?php

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /** @var ProductService */
    private $productService;

    function __construct(
        ProductService $productService
    ) {
        $this->productService = $productService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Product::all()->count() == 0) {
            $productsFile = file_get_contents( __DIR__ . "/products.json");

            $products = json_decode($productsFile, true);

            foreach ($products as $product) {
                $this->productService->create($product);
            }
        }
    }
}
