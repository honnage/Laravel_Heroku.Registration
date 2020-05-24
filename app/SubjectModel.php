<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table="register_course";
    protected $fillable = [
        'code',
        'nameTH',
        'nameEN',
        'price',

    ];
}
