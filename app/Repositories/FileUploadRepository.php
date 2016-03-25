<?php

namespace App\Repositories;

use App\Models\FileUpload;
use Housekeeper\Repository;
use Housekeeper\Action;

class FileUploadRepository extends Repository
{
    /**
     * Return the name of model that this repository used.
     *
     * @return string
     */
    protected function model()
    {
        return FileUpload::class;
    }

    /**
     * This is just like the constructor.
     */
    public function boot()
    {
        //
    }
}