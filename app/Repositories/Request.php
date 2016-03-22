<?php

namespace App\Repositories;

use Housekeeper\Repository;
use Housekeeper\Action;

class Request extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return \App\Models\Request::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
