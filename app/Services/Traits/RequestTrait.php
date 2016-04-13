<?php

namespace App\Services\Traits;

use App\Repositories\ProductRepository;
use App\Repositories\RequestObservationRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait RequestTrait
{
    /**
     * @param  Request $request
     * @param  Model $model
     * @param  ProductRepository $productRepository
     */
    public function addProducts(Request $request, Model $model, ProductRepository $productRepository)
    {
        foreach ($request->get('products') as $index => $product) {
            $productObject = $productRepository->find($product['id']);

            $model->products()->attach(
                $productObject,
                [
                    'unity_price' => $productObject->price,
                    'quantity' => $product['quantity'],
                    'total_price' => ($product['quantity'] * $productObject->price),
                ]
            );
        }

        $this->addObservation($request, $model);
    }

    /**
     * @param  Request $request
     * @param  Model $model
     */
    public function addObservation(Request $request, Model $model)
    {
        foreach ($request->get('products') as $index => $product) {
            if (empty($product['observation']) || is_null($product['observation'])) {
                continue;
            }

            $requestObservationRepository = (new RequestObservationRepository(app()))->getCurrentPlan()->getModel();
            $requestObservationRepository->requests_products_id = $model->id;
            $requestObservationRepository->observation = $product['observation'];
            $requestObservationRepository->save();
        }
    }
}