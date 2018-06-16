<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DoctorRequest extends Model
{
    protected $table = 'doctor_request';

    protected $fillable = [
        'semester_id','doctor_name','dept_title','prerequisite_course','level','day','start_at','end_at','lec_hour','course_title','state'
    ];
}
