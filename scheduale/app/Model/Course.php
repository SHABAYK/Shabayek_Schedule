<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'faculty_course_id', 'semester_id','no_of_lectures','no_of_doctors'
    ];
}
