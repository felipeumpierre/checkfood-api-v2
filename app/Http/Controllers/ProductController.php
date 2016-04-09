<?php

namespace App\Http\Controllers;

use App\Repositories\IngredientRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show the products with category
     *
     * @return string
     */
    public function index()
    {
        return Cache::remember('product', Config::get('checkfood.cache.main'), function () {
            return $this->productRepository->with([
                'category'
            ])->all();
        });
    }

    /**
     * Show product with category
     *
     * @param  integer $id
     * @return string
     */
    public function show($id)
    {
        $exists = Cache::remember(sprintf('product.exists.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->productRepository->exists($id);
        });

        if (!$exists) {
            $this->response()->errorNotFound('Product not found');
        }

        return Cache::remember(sprintf('product.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->productRepository->with([
                'category'
            ])->find($id);
        });
    }

    /**
     * Get the ingredients from a product
     *
     * @param  integer $id
     * @return mixed
     */
    public function ingredients($id)
    {
        return Cache::remember(sprintf('product.ingredients.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->productRepository->find($id)->ingredients()->get();
        });
    }

    /**
     * Create a new product
     *
     * @param  Request $request
     * @return string
     */
    public function add(Request $request)
    {
        try {
            return $this->productRepository->create($request->all());
        } catch (\Exception $e) {
            $this->response()->errorInternal();
        }
    }

    /**
     * @param  integer $id
     * @param  Request $request
     * @return string
     */
    public function edit($id, Request $request)
    {
        // TODO: edit product
    }

    /**
     * @param  integer $id
     * @return string
     */
    public function delete($id)
    {
        // TODO: delete product
    }

    /**
     * @param  string $keyword
     * @return string
     */
    public function search($keyword)
    {
        // TODO: search products
    }
}
