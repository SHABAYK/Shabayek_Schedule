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

    public function querycourses(){

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
        if(count($my_array) == 1 ) return $my_array;
        $mid = count($my_array) / 2;
        $left = array_slice($my_array, 0, $mid);
        $right = array_slice($my_array, $mid);
        $left = merge_sort($left);
        $right = merge_sort($right);
        return merge($left, $right);
    }
    function merge($left, $right){
        $res = array();
        while (count($left) > 0 && count($right) > 0){
            if($left[0] > $right[0]){
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
    // $test_array = array(100, 54, 7, 2, 5, 4, 1);
    // echo "Original Array : ";
    // echo implode(', ',$test_array );
    // echo "\nSorted Array :";
    // echo implode(', ',merge_sort($test_array))."\n";
    
    public function sorting($courses){

    }
    
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
        // print_r($this->total_halls);
        // dd($this->total_halls);
    }

    public function search_course($title ,$day,$time,$end/*, $courses*/){

        //dd($courses,$title ,$day,$time);
        $courses    =$this->querycourses();
        foreach($courses as $course){
            $during_at  = date('H:i:s',strtotime('+1 hour',strtotime($course->start_at)));
            $end_at     = date('H:i:s',strtotime('+1 hour',strtotime($during_at)));
            
            $during_time= date('H:i:s',strtotime('+1 hour',strtotime($time)));
            //$end_time=date('H:i:s',strtotime('+1 hour',strtotime($during_time)));

            // if($hour==2){
            //     if($title == $course->course_title && $day == $course->day && 
            //     (   strtotime($time)        == strtotime($course->start_at) || strtotime($time)     == strtotime($end_at) 
            //     ||  strtotime($end_time)    == strtotime($course->start_at) || strtotime($end_time) == strtotime($end_at))){
                                        
            //         //return $course;
            //     }
            // }
           // if($hour==3){
                if($title == $course->course_title && $day == $course->day && 
                    (   strtotime($time)        == strtotime($course->start_at) || strtotime($time)         == strtotime($during_at) || strtotime($time)        == strtotime($end_at)
                    ||  strtotime($during_time) == strtotime($course->start_at) || strtotime($during_time)  == strtotime($during_at) || strtotime($during_time) == strtotime($end_at)
                    ||  strtotime($end)         == strtotime($course->start_at) || strtotime($end)          == strtotime($during_at) || strtotime($end)         == strtotime($end_at))){
                                       
                   return $course;
                }
            //}
            
        }
        return null;
    }

    public function add_course($course){
        //dd($course);
        $halls      = $this->queryhalls();
        $day        = $course->day;
        $start_at   = $course->start_at;
        $during     = date('H:i:s',strtotime('+1 hour',strtotime($start_at)));               //$during=$start_at+1;
        $end_at     = date('H:i:s',strtotime('-1 hour',strtotime($course->end_at)));                 //$end_at=$during+1;                           // for case 3 ....
        
        // switch($course->lec_hour){								
            
        //     case 2:
            foreach($halls as $hall){    
                
                if(    $this->total_halls[$hall][$day][$start_at]   == null 
                    && $this->total_halls[$hall][$day][$during]     == null 
                    && $this->total_halls[$hall][$day][$end_at]     == null)
                {
                    foreach($halls as $h){
                        
                        $course_added_title=$this->total_halls[$h][$day][$start_at];
                        
                        if($this->total_halls[$h][$day][$start_at] != null || $this->total_halls[$h][$day][$during] != null || $this->total_halls[$h][$day][$end_at] != null){
                        
                            echo 'course exit => '.$course_added_title.'<br>';
                            $course_exist=$this->search_course($course_added_title,$day,$start_at,$end_at/*,$this->courses*/);
                           
                            if($course_exist == null){echo 'kkkkkkk';continue;}
                            else{
                                echo  $course->dept_title.' , '.$course_exist->dept_title;
                                if($course->dept_title == $course_exist->dept_title && ($course->course_title != $course_exist->prerequisite_course && $course->prerequisite_course != $course_added_title)){
                                    
                                    echo ' <br>'.$course->course_title.' dept';
                                    return 1; 
                                }
                                if($course->level == $course_exist->level || $course->doctor_name == $course_exist->doctor_name){
                                    
                                    echo' <br>'.$course->course_title.' level or doctor';
                                    return 1;

                                }else continue;
                            }    
                        }else continue;
                    }
                    $this->total_halls[$hall][$day][$start_at] = $course->course_title;
                    $this->total_halls[$hall][$day][$during]   = $course->course_title;
                    $this->total_halls[$hall][$day][$end_at]   = $course->course_title;
                    echo '  <br>'.$course->course_title.' => title <br>';
                    return 0;        
                }else continue;
            }
            // case 3:
            // foreach($halls as $hall){    
            
            //     if($this->total_halls[$hall][$day][$start_at] == null && $this->total_halls[$hall][$day][$during] == null && $this->total_halls[$hall][$day][$end_at] == null)
            //     {
            //         foreach($halls as $h){
                        
            //             $course_added_title=$this->total_halls[$h][$day][$start_at];
                        
            //             if($this->total_halls[$h][$day][$start_at] != null || $this->total_halls[$h][$day][$during] != null || $this->total_halls[$h][$day][$end_at] != null){
                        
            //                 echo 'course exit => '.$course_added_title.'<br>';
            //                 $course_exist=$this->search_course($course_added_title,$day,$start_at,3/*,$this->courses*/);
                           
            //                 if($course_exist==null){echo 'kkkkkkk';continue;}
            //                 else{
            //                     echo  $course->dept_title.' , '.$course_exist->dept_title;
            //                     if($course->dept_title == $course_exist->dept_title && ($course->course_title != $course_exist->prerequisite_course && $course->prerequisite_course != $course_added_title)){
                                    
            //                         echo ' <br>'.$course->course_title.' dept';
            //                         return 1;
                                    
            //                     }
            //                     if($course->level == $course_exist->level || $course->doctor_name == $course_exist->doctor_name){
                                    
            //                         echo' <br>'.$course->course_title.' level or doctor';
            //                         return 1;

            //                     }else continue;
            //                 }    
            //             }else continue;
            //         }
            //         $this->total_halls[$hall][$day][$start_at] = $course->course_title;
            //         $this->total_halls[$hall][$day][$during]   = $course->course_title;
            //         echo '  <br>'.$course->course_title.' => title <br>';
            //         return 0;        
            //     }else continue;
            // }
            echo'gggggg';
            return 1;    
        //}
    }

    public function recommended_course($course){
        
        $halls      = $this->queryhalls();
        $work_days  = $this->querywork_day();
        $m=0;
        // switch($course->lec_hour){								
            
        //     case 2:
            foreach($halls as $hall){ 						
                foreach($work_days as $workday){
                    $day = $workday->day;

                    //$j=$workday->start_at;
                    for($j = $workday->start_at;strtotime($j) <= strtotime($workday->end_at);$j = date('H:i:s',strtotime('+1 hour',strtotime($j)))){
                        
                        //$this->total_halls[$hall][$workday->day][$j]=null;
                        $during = date('H:i:s',strtotime('+1 hour',strtotime($j)));
                        $end_at;
                        if($course->lec_hour == 2){

                            $end_at = $during;
                        }else{

                            $end_at = date('H:i:s',strtotime('+1 hour',strtotime($during)));
                        }
                        //dd($during,$end_at ,$workday->end_at);
                        //dd($workday ,$this->total_halls);
                        if(     $this->total_halls[$hall][$day][$j]      == null 
                            &&  $this->total_halls[$hall][$day][$during] == null 
                            &&  $this->total_halls[$hall][$day][$end_at] == null){
                            
                            $xx=0;

                            foreach($halls as $h){
                                
                                if($this->total_halls[$h][$day][$j] != null || $this->total_halls[$h][$day][$during] != null || $this->total_halls[$h][$day][$end_at] != null){  
                                    $course_added_title=$this->total_halls[$h][$day][$j];
                                    if($course_added_title==null){continue;}
                                    echo 'recommended_course '.$course_added_title;
                                    
                                    $course_exist=$this->search_course($course_added_title,$day,$j/*,$this->courses*/);
                                
                                    if($course_exist==null){echo '<br> recommended kkkkkkk<br> ';continue;}
                                    else{
                                        
                                        if($course->dept_title == $course_exist->dept_title && ($course->course_title != $course_exist->prerequisite_course && $course->prerequisite_course != $course_added_title)){
                                            
                                            echo ' <br>'.$course->course_title.' recommended dept';
                                            $xx++;
                                            //dd($xx);
                                            break;
                                            
                                        }
                                        if($course->level == $course_exist->level || $course->doctor_name == $course_exist->doctor_name){
                                            
                                            echo' <br>'.$course->course_title.' recommended level or doctor';
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
                                echo '  <br>'.$xx.' '.$course->course_title.' => title recommended <br>';
                                return 0;
                            }else continue;
                            
                        }
                        // $j= date('H:i:s',strtotime('+1 hour',strtotime($j)));
                    }	                    
                }
           }
            //echo ' xx => '.$xx;
            return 1;
        //}    
    }



/**********************************   Main function       *******************************/
    public function index()
    {
        
        $courses    =$this->querycourses();
        $conflicted =array();
        $conflict   =array();
        $halls      =$this->queryhalls();
        $work_days  =$this->querywork_day();

        if(!empty($halls) && !empty($work_days)){

            $this->halls($halls,$work_days);
        }
        if(!empty($courses) ){

            foreach($courses as $course){
                
                $recommended=$this->add_course($course);
                if($recommended  == 0){
                    continue;
                }else {
                    array_push($conflicted,$course);
                    echo '<br> conflicted <hr>';
                    print_r( $course);
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
                    echo '<br> conflict KK <hr>';
                    print_r($course);
                }
            }
        }
        echo '<hr>';
        dd($conflicted,$conflict,$this->total_halls);
    }
}
