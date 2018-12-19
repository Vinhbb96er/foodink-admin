<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'store_id',
        'address',
        'phone',
        'ship_cost',
        'total',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
