<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Show the products with category
     *
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->with(['category'])->all();

        return Response::json($products);
    }

    /**
     * @param  integer $id
     * @param  ProductRepository $productRepository
     * @return string
     */
    public function show($id, ProductRepository $productRepository)
    {
        return Response::json($productRepository->with(['category'])->find($id));
    }

    /**
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
