<?php

namespace App\Repositories;

use Housekeeper\Repository;
use Housekeeper\Action;

class Opinion extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return \App\Models\Opinion::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
