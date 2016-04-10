<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\Traits\ProductTrait;
use Illuminate\Support\Facades\Config;
use App\Repositories\ProductRepository;
use App\Services\Traits\IngredientTraits;
use App\Repositories\IngredientRepository;

class ProductController extends Controller
{
    use IngredientTraits, ProductTrait;

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
     * @return Response
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
     * @return Response
     */
    public function show($id)
    {
        $this->productExists($id, $this->productRepository, $this->response());

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
        return Cache::remember(sprintf('product.ingredients.%d', $id), Config::get('checkfood.cache.main'),
            function () use ($id) {
                return $this->productRepository->find($id)->ingredients()->get();
            });
    }

    /**
     * Create a new product
     *
     * @param  Request $request
     * @return Response
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
     * @return Response
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
     * Delete a product
     *
     * @param  integer $id
     * @return Response
     */
    public function delete($id)
    {
        try {
            $this->productRepository->delete($id);

            return $this->response()->noContent();
        } catch (\Exception $e) {
            $this->response()->errorInternal();
        }
    }
}
