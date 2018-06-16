<?php
/**
 * Created by PhpStorm.
 * User: 7oor
 * Date: 6/8/2018
 * Time: 6:01 PM
 */

namespace app\Model;

use Illuminate\Database\Eloquent\Model;
class doctor_request extends Model
{
    protected $table = 'doctor_request';

    protected $fillable = [
        'semester_id', 'doctor_name' ,'course_title' ,'dept_title','prerequisite_course','level','day','start_at','	end_at','lec_hour',
        'state'
    ];
}
