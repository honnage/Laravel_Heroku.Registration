<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{
    protected $table="orderitems";
    protected $fillable = [
        'item_id',
        'item_code',
        'item_price',
        'item_amoun',
    ];

    // public function subjects(){
    //     return $this->belongsTo(SubjectModel::class);
    // }

    // public function OrderModel(){
    //     return $this->hasMany('App\OrderModel','order_id');
    // }
}
