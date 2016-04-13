<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestObservation extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'request_products_id',
        'observation',
    ];

    /**
     * @var string
     */
    protected $table = 'requests_observation';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requestProducts()
    {
        return $this->hasMany(Product::class, 'id', 'request_products_id');
    }
}
