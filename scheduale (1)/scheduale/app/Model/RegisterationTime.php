<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegisterationTime extends Model
{
    protected $table = 'registration_time';

    protected $fillable = [
        'start_regstudent_date', 'end_regstudent_date','start_regdoctor_date','end_regdoctor_date','start_semester_date','end_semester_date'
    ];

    //$works->date =  date('Y-m-d', strtotime(str_replace('-', '/', $request['date'])));
}
