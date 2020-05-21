<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailModel extends Model
{
    protected $table="details";
    protected $fillable = [
        'user_id',
        'code_id',
        'Firstname_TH',
        'Lastname_TH',
        'Firstname_EN',
        'Lastname_EN',
        'gender',
        'birthdate',
        'phone',
        'status',
        'address',

    ];
}
