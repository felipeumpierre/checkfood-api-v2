<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'pivot'  
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, 'products_ingredients', 'products_id', 'ingredients_id');
    }
}
