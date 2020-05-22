<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table="Subjects";
    protected $fillable = [
        'code',
        'nameTH',
        'nameEN',
        'price',

    ];
}
