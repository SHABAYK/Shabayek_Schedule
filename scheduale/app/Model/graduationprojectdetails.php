<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class graduationproject extends Model
{
    protected $table = 'graduation_project_details';

    protected $fillable = [
        'GP_id', 'student_id' , 'dept_id' , 'grade'
    ];
}
