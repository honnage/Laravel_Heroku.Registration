<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table="subjects";
    protected $fillable = [
        'code',
        'nameTH',
        'nameEN',
        'price',

    ];
}
