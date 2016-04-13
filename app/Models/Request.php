<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'status_id',
        'boards_id',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function board()
    {
        return $this->hasOne(Board::class, 'id', 'boards_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'requests_products', 'requests_id', 'products_id')
            ->withPivot('id', 'unity_price', 'quantity', 'total_price')
            ->withTimestamps();
    }
}
