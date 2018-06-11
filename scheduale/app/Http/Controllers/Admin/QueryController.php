<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Hall;
use DB;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index(){


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
            )->get();

     /*    $courses[]= DB::table('faculty_courses')
             ->join('department','faculty_courses.dept_id','=','department.id')
             ->select(
                 'faculty_courses.title',
                 'faculty_courses.level',
                 'department.name'
             )->get();

        $courses []= DB::table('courses_doctor')
             ->join('doctors','courses_doctor.doctor_id','=','doctors.id')
             ->join('users','doctors.user_id','=','users.id')
             ->select(
                 'users.username',
                 'courses_doctor.start_at',
                 'courses_doctor.end_at'
             )->get();*/
   /* foreach ($courses as $cours){

        return $cours->title;
    }*/
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
        $doctor = DB::table('doctors')
            ->join('hiring_info','doctors.hiring_info_id','=','hiring_info.id')
            ->join('users','doctors.user_id','=','users.id')
            ->select(
                'users.username',
                'hiring_info.hiring_degree'
            )->get();
        return $doctor;
           }
}
