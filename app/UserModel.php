<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table="users";
    protected $fillable = [
        'id',
        'username',
        'status',
        'email',
        'detail',

    ];

    public function detail(){
        return $this->hasMany('App\DetailModel','user_id');
        // return $this->hasOne('App\DetailModel','user_id');
        // return $this->belongsTo(DetailModel::class);
    }

}
