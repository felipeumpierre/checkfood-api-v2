<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    protected $productRepository;

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
     *
     *
     * @param  integer $id
     * @return string
     */
    public function show($id)
    {
        return Cache::remember(sprintf('product.%d', $id), Config::get('checkfood.cache.main'), function () use ($id) {
            return $this->productRepository->with(['category'])->find($id);
        });
    }

    /**
     * 
     *
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function add(ProductRepository $productRepository)
    {
        // TODO: insert product
    }

    /**
     * @param  integer $id
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function edit($id, ProductRepository $productRepository)
    {
        // TODO: edit product
    }

    /**
     * @param  integer $id
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function delete($id, ProductRepository $productRepository)
    {
        // TODO: delete product
    }

    /**
     * @param  string $keyword
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function search($keyword, ProductRepository $productRepository)
    {
        // TODO: search products
    }
}
