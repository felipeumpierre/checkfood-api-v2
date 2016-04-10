<?php

namespace App\Services\Traits;

use Dingo\Api\Http\Response\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use App\Repositories\ProductRepository;

trait ProductTrait
{
    /**
     * Check if the product exists and create a cache of the result
     *
     * @param  integer $id
     * @param  ProductRepository $productRepository
     * @param  Factory $factory
     */
    public function productExists($id, ProductRepository $productRepository, Factory $factory)
    {
        $exists = Cache::remember(sprintf('product.exists.%d', $id), Config::get('checkfood.cache.main'), function () use ($id, $productRepository) {
            return $productRepository->exists($id);
        });

        if (!$exists) {
            $factory->errorNotFound('Product not found');
        }
    }
}