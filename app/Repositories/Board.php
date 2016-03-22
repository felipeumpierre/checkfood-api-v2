<?php

namespace App\Repositories;

use Housekeeper\Repository;
use Housekeeper\Action;

class Board extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return \App\Models\Board::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}
