<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $table = 'registration_courses';

    protected $fillable = [
        'student_id','course_id','year_id','student_name','doctor_name','course_title','calss_grade','practical','final'
    ];

}