<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HiringInfo extends Model
{
    protected $table = 'hiring_info';

    protected $fillable = [
        'hiring_degree', 'hiring_date','last_degree','last_date','lastest_degree','lastest_date'
    ];
}
