<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HiringInfo extends Model
{
    protected $table = 'hiring_info';

    protected $fillable = [
        'academic_degrees_id', 'hiring_date','academic_last_degrees_id','last_date','academic__lastest_degrees_id','lastest_date'
    ];

    public function academic_degrees_id(){
        return $this->hasOne('App\Model\Academic_Degree','id','academic_degrees_id');
    }
    public function academic_last_degrees_id(){
        return $this->hasOne('App\Model\Academic_Degree','id','academic_last_degrees_id');
    }
    public function academic__lastest_degrees_id(){
        return $this->hasOne('App\Model\Academic_Degree','id','academic__lastest_degrees_id');
    }
}
