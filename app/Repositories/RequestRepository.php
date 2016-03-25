<?php

namespace App\Repositories;

use App\Models\Request;
use Housekeeper\Repository;
use Housekeeper\Action;

class RequestRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return Request::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
