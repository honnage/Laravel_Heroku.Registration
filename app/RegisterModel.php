<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table="registers";
    protected $fillable = [
        'Registers_code',
        'user_id',
        'price',
        'status',
        'date',
    ];
}
