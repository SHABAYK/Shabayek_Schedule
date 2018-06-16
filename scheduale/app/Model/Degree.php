<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = 'degrees';

    protected $fillable = [
       'doctor_id','research_area_id'
    ];
}
