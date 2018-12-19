<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipperOrder extends Model
{
    protected $fillable = [
        'shipper_id',
        'order_id',
        'status',
    ];

    protected $appends = [
        'status_text',
    ];

    public function shipper()
    {
        return $this->belongsTo(Shipper::class, 'shipper_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function getStatusTextAttribute()
    {
        return trans('lang.shipper_order.status.' . array_flip(config('setting.shipper_order.status'))[$this->status]);
    }
}
