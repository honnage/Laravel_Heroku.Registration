<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table="orders";
    protected $fillable = [
        // 'order_id',
        'date',
        'price',
        'status',
        'Firstname_TH',
        'Lastname_TH',
        'Firstname_EN',
        'Lastname_EN',
        'address',
        'phone',
        'email',
        'user_id',

    ];
}
