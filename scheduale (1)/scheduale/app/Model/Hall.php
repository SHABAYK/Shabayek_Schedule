<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $table = 'halls';

    protected $fillable = [
        'title', 'capacity'
    ];
}
