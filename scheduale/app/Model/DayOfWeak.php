<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DayOfWeak extends Model
{
    protected $table = 'dayof_week';

    protected $fillable = [
        'day'
    ];
}
