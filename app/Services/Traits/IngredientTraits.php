<?php

namespace App\Services\Traits;

use App\Models\Product;
use Illuminate\Http\Request;

trait IngredientTraits
{
    /**
     * @param  Product $product
     * @param  Request $request
     */
    public function addIngredientsToProduct(Product $product, Request $request)
    {
        if ($request->exists('ingredients')) {
            $this->removeExistingIngredientsFromProduct($product);

            foreach ($request->get('ingredients') as $index => $ingredient) {
                $product->ingredients()->attach(
                    $product->ingredients()->find($ingredient)
                );
            }
        }
    }

    /**
     * Remove all the ingredients from a product
     *
     * @param  Product $product
     */
    public function removeExistingIngredientsFromProduct(Product $product)
    {
        $product->ingredients()->detach();
    }
}