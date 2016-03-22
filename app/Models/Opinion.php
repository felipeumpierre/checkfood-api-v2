<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'grade',
        'opinion',
    ];
}
