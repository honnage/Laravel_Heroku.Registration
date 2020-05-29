<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table="orders";
    protected $fillable = [
        // 'Firstname_TH',
        // 'Lastname_TH',
        // 'Firstname_EN',
        // 'Lastname_EN',
        // 'email',
        // 'phone',
        'date',
        'price',
        'status',
        'image',
        'user_id',

    ];
    // public function detail(){
    //     return $this->belongsTo(DetailModel::class);
    // }
}
