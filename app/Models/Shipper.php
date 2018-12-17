<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $fillable = [
        'user_id',
        'identity_number',
        'status',
    ];

    protected $appends = [
        'status_text',
    ];

    public function info()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getStatusTextAttribute()
    {
        return trans('lang.shipper.status.' . array_flip(config('setting.shipper.status'))[$this->status]);
    }
}
