<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class MenuController extends Controller
{
    /**
     * @var array
     */
    private $groupedOptions = [
        'category',
    ];

    /**
     * Show all the products with category and ingredients
     *
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function menu(ProductRepository $productRepository)
    {
        $products = $productRepository->with([
            'category',
            'ingredients',
        ])->all();

        return response()->json($products);
    }

    /**
     * Show the menu grouped by option selected
     *
     * @param  string $option
     * @param  CategoryRepository $categoryRepository
     * @return string
     */
    public function grouped($option, CategoryRepository $categoryRepository)
    {
        if (!in_array($option, $this->groupedOptions)) {
            return response()->json([
                'message' => 'Option not supported.',
                'error' => 'OPTION_INVALID',
            ]);
        }

        $categories = $categoryRepository->with([
            'products'
        ])->all([
            'id',
            'name',
        ]);

        return response()->json($categories);
    }

    /**
     * Show just the products from a category
     *
     * @param  integer $category
     * @param  CategoryRepository $categoryRepository
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function category($category, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        if (!$categoryRepository->exists($category)) {
            return response()->json([
                'message' => 'This category not exist.',
                'error' => 'NO_RECORD_FOUND',
            ]);
        }

        return response()->json($productRepository->findByField('categories_id', $category)->all([
            'id',
            'name',
            'description',
            'price',
        ]));
    }
}
