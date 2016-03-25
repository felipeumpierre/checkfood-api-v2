<?php

namespace App\Repositories;

use App\Models\RequestObservation;
use Housekeeper\Repository;
use Housekeeper\Action;

class RequestObservationRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return RequestObservation::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
