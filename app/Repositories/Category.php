<?php

namespace App\Repositories;

use Housekeeper\Repository;
use Housekeeper\Action;

class Category extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return \App\Models\Category::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
