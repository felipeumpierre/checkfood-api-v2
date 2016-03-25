<?php

namespace App\Repositories;

use App\Models\Ingredient;
use Housekeeper\Repository;
use Housekeeper\Action;

class IngredientRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return Ingredient::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
