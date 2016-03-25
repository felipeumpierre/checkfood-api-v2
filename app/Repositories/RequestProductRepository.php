<?php

namespace App\Repositories;

use App\Models\RequestProduct;
use Housekeeper\Repository;
use Housekeeper\Action;

class RequestProductRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return RequestProduct::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
