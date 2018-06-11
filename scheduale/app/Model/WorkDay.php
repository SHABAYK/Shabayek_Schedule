<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    protected $table = 'work_day';

    protected $fillable = [
        'day_week_id', 'start_at','end_at'
    ];

    public function days(){
      return $this->hasOne('App\Model\DayOfWeak','id','day_week_id');
    }
}
