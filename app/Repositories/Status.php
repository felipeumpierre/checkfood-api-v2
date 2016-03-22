<?php

namespace App\Repositories;

use Housekeeper\Repository;
use Housekeeper\Action;

class Status extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return \App\Models\Status::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
