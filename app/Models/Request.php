<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['status_id', 'boards_id'];

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
        return $this->belongsToMany(Product::class, 'requests_products')->withPivot('id', 'unity_price', 'quantity', 'total_price')->withTimestamps();
    }
}
