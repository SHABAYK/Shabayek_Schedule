<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';

    protected $fillable = [
        'year'
    ];
}
