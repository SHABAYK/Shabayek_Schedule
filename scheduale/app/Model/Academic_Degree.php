<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Academic_Degree extends Model
{
    protected $table = 'academic_degrees';

    protected $fillable = [
        'degree', 'priority'
    ];
}
