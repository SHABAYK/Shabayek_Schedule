<?php

namespace App\Http\Controllers\Algorithm;

use App\Http\Controllers\Controller;
use App\Model\Hall;
use DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index(){

        $semester = DB::table('semesters')->pluck('id')->first();

        $courses = DB::table('doctor_request')
            ->join('semesters','doctor_request.semester_id','=','semesters.id')  //
            ->select(
                'semesters.title',
                'doctor_request.doctor_name',
                'doctor_request.course_title',
                'doctor_request.dept_title',
                'doctor_request.prerequisite_course',
                'doctor_request.level',
                'doctor_request.start_at',
                'doctor_request.end_at',
                'doctor_request.end_at',
                'doctor_request.lec_hour',
                'doctor_request.state'
            )->where('doctor_request.state','accept')
            ->where('semesters.id',$semester)
            ->get();

        return $courses;

    }

    public function halls(){
        $halls = Hall::orderBy('id','asc')->pluck('title');
        print_r($halls);
    }

    public function work_day(){
        $work_days = DB::table('dayof_week')
            ->join('work_day','dayof_week.id','=','work_day.id')
            ->select(
                'dayof_week.day',
                'work_day.start_at',
                'work_day.end_at'
            )->get();

        print_r($work_days);

    }
    public function doctor(){
       /* $academic_degree = DB::table('academic_degrees')->pluck('id');
       // return $academic_degree;*/
        $doctor = DB::table('doctors')
            ->join('hiring_info','doctors.hiring_info_id','=','hiring_info.id')
            ->join('academic_degrees','academic_degrees.id','=','hiring_info.academic_degrees_id')
            ->join('users','doctors.user_id','=','users.id')
            ->select(
                'users.username',
                'academic_degrees.priority',
                'hiring_info.hiring_date'
            )->get();
        return $doctor;
    }
}
