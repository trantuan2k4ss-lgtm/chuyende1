<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'name',
        'type',
        'value',
        'min_order',
        'quantity',
        'start_date',
        'end_date',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
