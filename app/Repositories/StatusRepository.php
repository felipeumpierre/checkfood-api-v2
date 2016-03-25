<?php

namespace App\Repositories;

use App\Models\Status;
use Housekeeper\Repository;
use Housekeeper\Action;

class StatusRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return Status::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
