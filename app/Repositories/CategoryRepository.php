<?php

namespace App\Repositories;

use App\Models\Category;
use Housekeeper\Repository;
use Housekeeper\Action;

class CategoryRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return Category::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
