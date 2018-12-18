<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'open_at',
        'close_at',
        'description',
        'status',
    ];

    protected $appends = [
        'status_text',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getStatusTextAttribute()
    {
        return trans('lang.store.status.' . array_flip(config('setting.store.status'))[$this->status]);
    }
}
