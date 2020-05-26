<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table="register_course";
    protected $fillable = [
        'user_id',
        'code',
        'nameTH',
        'nameEN',
        'status',
    ];
}
