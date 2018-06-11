<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'credit_hours', 'user_id','dept_id','entry_date'
    ];

    public function get_id(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function dept_id(){
        return $this->hasOne('App\Model\Department','id','dept_id');
    }
}
