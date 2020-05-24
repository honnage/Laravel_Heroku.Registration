<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OderItemModel extends Model
{
    protected $table="orderitems";
    protected $fillable = [
        'item_id',
        'order_id',
        'item_code',
        'item_price',
        'item_amoun',

    ];
}
