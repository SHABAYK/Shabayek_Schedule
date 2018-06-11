<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResearchArea extends Model
{
    protected $table = 'research_area';

    protected $fillable = [
        'specialization_major'
    ];
}
