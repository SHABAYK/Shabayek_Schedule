<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'hiring_info_id', 'user_id','dept_id'
    ];

    public function get_id(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function dept_id(){
        return $this->hasOne('App\Model\Department','id','dept_id');
    }
}
