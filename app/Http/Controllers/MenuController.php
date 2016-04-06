<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
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
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show all the products with category and ingredients
     *
     * @return string
     */
    public function menu()
    {
        $products = Cache::remember(
            'products.completed',
            Config::get('checkfood.cache.main'),
            function () {
                return $this->productRepository->with([
                    'category',
                    'ingredients',
                ])->all();
            }
        );

        return Response::json($products, 200);
    }

    /**
     * Show the menu grouped by option selected
     *
     * @param  string $option
     * @return string
     */
    public function grouped($option)
    {
        if (!in_array($option, $this->groupedOptions)) {
            return Response::json([
                'message' => 'Option not supported.',
                'error' => 'OPTION_INVALID',
            ], 400);
        }

        $categories = Cache::remember(
            sprintf('category.grouped.%s', $option),
            Config::get('checkfood.cache.main'),
            function () {
                return $this->categoryRepository->with([
                    'products'
                ])->all([
                    'id',
                    'name',
                ]);
            }
        );

        return Response::json($categories, 200);
    }

    /**
     * Show just the products from a category
     *
     * @param  integer $id
     * @return string
     */
    public function category($id)
    {
        $exists = Cache::remember(
            sprintf('category.%d', $id),
            Config::get('checkfood.cache.main'),
            function () use ($id) {
                return $this->categoryRepository->exists($id);
            }
        );

        if (!$exists) {
            return Response::json([
                'message' => 'This category not exist.',
                'error' => 'NO_RECORD_FOUND',
            ], 400);
        }

        $products = Cache::remember(
            sprintf('category.%d.products', $id),
            Config::get('checkfood.cache.main'),
            function () use ($id) {
                return $this->productRepository->findByField('categories_id', $id)->all([
                    'id',
                    'name',
                    'description',
                    'price',
                ]);
            }
        );

        return Response::json($products, 200);
    }
}
