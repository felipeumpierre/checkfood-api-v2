<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use App\Repositories\ProductRepository;
use App\Services\Traits\IngredientTraits;
use App\Repositories\IngredientRepository;

class ProductController extends Controller
{
    use IngredientTraits;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var IngredientRepository
     */
    protected $ingredientRepository;

    /**
     * @param  ProductRepository $productRepository
     * @param  IngredientRepository $ingredientRepository
     */
    public function __construct(ProductRepository $productRepository, IngredientRepository $ingredientRepository)
    {
        $this->productRepository = $productRepository;
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * Show the products with category
     *
     * @return mixed
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
     * @return mixed
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
    public function save(Request $request)
    {
        try {
            $product = $this->productRepository->create($request->all());

            $this->addIngredientsToProduct($product, $request);

            return $product;
        } catch (\Exception $e) {
            $this->response()->errorInternal();
        }
    }

    /**
     * Edit a product
     *
     * @param  integer $id
     * @param  Request $request
     * @return string
     */
    public function edit($id, Request $request)
    {
        try {
            $product = $this->productRepository->update($id, $request->all());

            $this->addIngredientsToProduct($product, $request);

            return $product;
        } catch (\Exception $e) {
            $this->response()->errorInternal();
        }
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
