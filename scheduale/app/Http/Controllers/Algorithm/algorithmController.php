<?php

namespace App\Http\Controllers\Algorithm;

use Illuminate\Http\Request;
use App\Model\Hall;
use DB;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Algorthim\QueryController;
class algorithmController extends Controller
{
    //

    /***************************    Query   ******************************/

    public function querydoctor(){

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

    public function queryacademicdegree(){
        $priorities = DB::table('academic_degrees')
        ->select('academic_degrees.priority')
        ->orderBy('priority', 'desc')
        ->get();
        
        return $priorities;

    }

    public function querycourses(){

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
                'doctor_request.day',
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

    public function queryhalls(){
        $halls = Hall::orderBy('id','asc')->pluck('title');
        return $halls;
    }

    public function querywork_day(){
        $work_days = DB::table('dayof_week')
            ->join('work_day','dayof_week.id','=','work_day.id')
            ->select(
                'dayof_week.day',
                'work_day.start_at',
                'work_day.end_at'
            )->get();

        return $work_days;

    }

/*************************************     Algorithm    *****************************************************/

    ////////////////////////////////////    sorting     ////////////////////////////////////////

    function merge_sort($my_array){
        
        if(count($my_array) == 1 )  return $my_array;
        $mid = count($my_array) / 2;
        $left = array_slice($my_array, 0, $mid);
        $right = array_slice($my_array, $mid);
        $left = $this->merge_sort($left);
        $right = $this->merge_sort($right);
        return $this->merge($left, $right);
    }

    function merge($left, $right){

        $res = array();
        while (count($left) > 0 && count($right) > 0){
            if($left[0]->hiring_date > $right[0]->hiring_date){
                $res[] = $right[0];
                $right = array_slice($right , 1);
            }else{
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }
        while (count($left) > 0){
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
        while (count($right) > 0){
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }
        return $res;
    }
    
    public function sorting($courses,$doctors){
        
        $degrees = $this->queryacademicdegree();
        $hiring = array();
        $hiring_sorts = array();
        $courses_sort = array();
        
        foreach($degrees as $degree){
            
            $hiring_info = array();
            foreach($doctors as $doctor){
                if($degree->priority == $doctor->priority){
                    array_push($hiring_info,$doctor);
                }else continue;
            }
            if($hiring_info != null){
                array_push($hiring,$hiring_info);
            }else continue;
        }
        if(!empty($hiring)){
            for($i=0;$i<sizeof($hiring);$i++){
                array_push($hiring_sorts,$this->merge_sort($hiring[$i]));
            }
        }
        if(!empty($hiring_sorts)){
            foreach($hiring_sorts as $hiring_sort){
                for($i=0;$i<sizeof($hiring_sort);$i++){
                    foreach($courses as $course){
                        if($hiring_sort[$i]->username == $course->doctor_name){
                            array_push($courses_sort,$course);
                        }else continue;
                    }
                }
            }
            return $courses_sort;
        }

    }
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public $total_halls = array();

    public function halls($halls, $work_days){
        
        foreach($halls as $hall){ 						
            foreach($work_days as $workday){

                $j=$workday->start_at;
                while(strtotime($j)<=strtotime($workday->end_at)){
                    $this->total_halls[$hall][$workday->day][$j] = null;
                    $j = date('H:i:s',strtotime('+1 hour',strtotime($j)));
                }	                    
            }
        }    
    }

    public function search_course($title ,$day,$time,$end){

        $courses    =$this->querycourses();
        foreach($courses as $course){
            $during_at  = date('H:i:s',strtotime('+1 hour',strtotime($course->start_at)));
            $end_at     = date('H:i:s',strtotime('+1 hour',strtotime($during_at)));
            
            $during_time= date('H:i:s',strtotime('+1 hour',strtotime($time)));

                if($title == $course->course_title && $day == $course->day && 
                    (   strtotime($time)        == strtotime($course->start_at) || strtotime($time)         == strtotime($during_at) || strtotime($time)        == strtotime($end_at)
                    ||  strtotime($during_time) == strtotime($course->start_at) || strtotime($during_time)  == strtotime($during_at) || strtotime($during_time) == strtotime($end_at)
                    ||  strtotime($end)         == strtotime($course->start_at) || strtotime($end)          == strtotime($during_at) || strtotime($end)         == strtotime($end_at))){
                                       
                   return $course;
                }
        }
        return null;
    }

    public function add_course($course){
        $halls      = $this->queryhalls();
        $day        = $course->day;
        $start_at   = $course->start_at;
        $during     = date('H:i:s',strtotime('+1 hour',strtotime($start_at)));               //$during=$start_at+1;
        $end_at     = date('H:i:s',strtotime('-1 hour',strtotime($course->end_at)));                 //$end_at=$during+1;                           // for case 3 ....

            foreach($halls as $hall){    
                
                if(    $this->total_halls[$hall][$day][$start_at]   == null 
                    && $this->total_halls[$hall][$day][$during]     == null 
                    && $this->total_halls[$hall][$day][$end_at]     == null)
                {
                    foreach($halls as $h){
                        
                        $course_added_title=$this->total_halls[$h][$day][$start_at];
                        
                        if($this->total_halls[$h][$day][$start_at] != null || $this->total_halls[$h][$day][$during] != null || $this->total_halls[$h][$day][$end_at] != null){
                        
                            $course_exist=$this->search_course($course_added_title,$day,$start_at,$end_at/*,$this->courses*/);
                           
                            if($course_exist == null){echo 'kkkkkkk';continue;}
                            else{
                                if($course->dept_title == $course_exist->dept_title && ($course->course_title != $course_exist->prerequisite_course && $course->prerequisite_course != $course_added_title)){
                                    
                                    return 1; 
                                }
                                if($course->level == $course_exist->level || $course->doctor_name == $course_exist->doctor_name){
                                    
                                    return 1;

                                }else continue;
                            }    
                        }else continue;
                    }
                    $this->total_halls[$hall][$day][$start_at] = $course->course_title;
                    $this->total_halls[$hall][$day][$during]   = $course->course_title;
                    $this->total_halls[$hall][$day][$end_at]   = $course->course_title;
                    return 0;        
                }else continue;
            }
            return 1;    
    }

    public function recommended_course($course){
        
        $halls      = $this->queryhalls();
        $work_days  = $this->querywork_day();
        $m=0;

            foreach($halls as $hall){ 						
                foreach($work_days as $workday){
                    $day = $workday->day;

                    for($j = $workday->start_at;strtotime($j) <= strtotime($workday->end_at);$j = date('H:i:s',strtotime('+1 hour',strtotime($j)))){
                        
                        $during = date('H:i:s',strtotime('+1 hour',strtotime($j)));
                        $end_at;
                        if($course->lec_hour == 2){

                            $end_at = $during;
                        }else{

                            $end_at = date('H:i:s',strtotime('+1 hour',strtotime($during)));
                        }

                        if(     $this->total_halls[$hall][$day][$j]      == null 
                            &&  $this->total_halls[$hall][$day][$during] == null 
                            &&  $this->total_halls[$hall][$day][$end_at] == null){
                            
                            $xx=0;

                            foreach($halls as $h){
                                
                                if($this->total_halls[$h][$day][$j] != null || $this->total_halls[$h][$day][$during] != null || $this->total_halls[$h][$day][$end_at] != null){  
                                    $course_added_title=$this->total_halls[$h][$day][$j];
                                    if($course_added_title==null){continue;}
                                    
                                    $course_exist=$this->search_course($course_added_title,$day,$j);
                                
                                    if($course_exist==null){continue;}
                                    else{
                                        
                                        if($course->dept_title == $course_exist->dept_title && ($course->course_title != $course_exist->prerequisite_course && $course->prerequisite_course != $course_added_title)){
                                            
                                            $xx++;
                                            break;
                                        }
                                        if($course->level == $course_exist->level || $course->doctor_name == $course_exist->doctor_name){
                                            
                                            $xx++;
                                            break;        
                                        }else continue;
                                    }    
                                }else continue;
                            }
                            if($xx==0){
                                $this->total_halls[$hall][$day][$j]         = $course->course_title;
                                $this->total_halls[$hall][$day][$during]    = $course->course_title;
                                $this->total_halls[$hall][$day][$end_at]    = $course->course_title;
                                return 0;
                            }else continue;
                        }
                    }	                    
                }
           }
            return 1;
    }


/**********************************   Main function       *******************************/
    public function index()
    {
        
        $courses_request    =$this->querycourses();
        $doctors    =$this->querydoctor();
        $conflicted =array();
        $conflict   =array();
        $halls      =$this->queryhalls();
        $work_days  =$this->querywork_day();

        if(!empty($halls) && !empty($work_days)){

            $this->halls($halls,$work_days);

            $courses = $this->sorting($courses_request,$doctors);
            if(!empty($courses) ){
                
                foreach($courses as $course){
                    
                    $recommended=$this->add_course($course);
                    if($recommended  == 0){
                        continue;
                    }else {
                        array_push($conflicted,$course);
                    }
                }
            }
            if(!empty($conflicted) ){
                shuffle($conflicted);
                
                foreach($conflicted as $course){
                    $added=$this->recommended_course($course);
                    if($added  == 0){
                        continue;
                    }else {
                        array_push($conflict,$course);
                    }
                }
            }
        }
        echo '<hr>';
        dd($conflicted,$conflict,$this->total_halls);
    }
}
