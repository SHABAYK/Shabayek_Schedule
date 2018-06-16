<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class graduationproject extends Model
{
    protected $table = 'graduation_project';

    protected $fillable = [
        'doctor_id', 'year_id' , 'title' , 'description'
    ];
}
