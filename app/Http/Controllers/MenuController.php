<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundRecordException;
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
     * @param ProductRepository $productRepository
     * @return string
     */
    public function menu(ProductRepository $productRepository)
    {
        $products = $productRepository->with([
            'category',
            'ingredients'
        ])->all();

        return Response::json($products);
    }

    /**
     * Return the menu grouped by option selected
     *
     * @param string $option
     * @param CategoryRepository $categoryRepository
     * @return string
     */
    public function grouped($option, CategoryRepository $categoryRepository)
    {
        if (!in_array($option, $this->groupedOptions)) {
            throw new \InvalidArgumentException('Option not supported.');
        }

        $categories = $categoryRepository->with([
            'products'
        ])->all([
            'id',
            'name'
        ]);

        return Response::json($categories);
    }

    /**
     * Return just the products from a category
     *
     * @param int $category
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     * @return string
     * @throws NotFoundRecordException
     */
    public function category($category, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        if (! $categoryRepository->find($category)->exists) {
            throw new NotFoundRecordException('This category not exist');
        }

        return Response::json($productRepository->findByField('categories_id', $category)->all([
            'id',
            'name',
            'description',
            'price'
        ]));
    }
}
