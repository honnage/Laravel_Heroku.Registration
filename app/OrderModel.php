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
        'image',
        'user_id',

    ];
    // public function orderitems(){
    //     return $this->belongsTo(OrderItemModel::class);
    // }
}
