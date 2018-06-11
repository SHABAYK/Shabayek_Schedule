<?php

namespace App\Http\Controllers\Manager;

use App\DataTables\CourseDataTable;
use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\FacultyCourse;
use Illuminate\Http\Request;
use App\Model\Semester;
use App\Model\RegisterationTime;
use App\User;
use Validator;
use Gate;
class CourseControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseDataTable $admin)
    {
        if (!Gate::allows('isManager')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Manager.Course.index',['title'=>'Open Course']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_faculty_courses = FacultyCourse::orderBy('id','desc')->get();
        $all_semesters = Semester::orderBy('id','desc')->get();
        return view('Manager.Course.create',['title'=>'Open Course','all_faculty_courses'=>$all_faculty_courses,'all_semesters'=>$all_semesters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),
            [
                'faculty_course_id'  =>'required|unique:courses',
                'semester_id'        =>'required',
                'no_of_lectures'     =>'required',
                'no_of_doctors'      =>'required',
            ],[],
            [
                'faculty_course_id'=>'Faculty Course',
                'semester_id'=>'Semester Title',
                'no_of_lectures'=>'Number Of Lectures',
                'no_of_doctors'=>'Number Of Doctors',
            ]);


        $faculty_course = FacultyCourse::find($request->input('faculty_course_id'));
        $data['faculty_course_id'] = $faculty_course->id;

        $semester = Semester::find($request->input('semester_id'));
        $data['semester_id'] = $semester->id;

        Course::create($data);

        session()->flash('success','Open Course Successfully');
        return redirect('course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_faculty_courses = FacultyCourse::orderBy('id','desc')->get();
        $all_semesters = Semester::orderBy('id','desc')->get();
        $course = Course::find($id);
        return view('Manager.Course.edit',['title'=>'Edit Open Course','all_faculty_courses'=>$all_faculty_courses,'all_semesters'=>$all_semesters,'course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'faculty_course_id'  =>'required|unique:courses',
                'semester_id'        =>'required',
                'no_of_lectures'     =>'required',
                'no_of_doctors'      =>'required',
            ],[],
            [
                'faculty_course_id'=>'Faculty Course',
                'semester_id'=>'Semester Title',
                'no_of_lectures'=>'Number Of Lectures',
                'no_of_doctors'=>'Number Of Doctors',
            ]);

        $faculty_course = FacultyCourse::find($request->input('faculty_course_id'));
        $data['faculty_course_id'] = $faculty_course->id;

        $semester = Semester::find($request->input('semester_id'));
        $data['semester_id'] = $semester->id;

        Course::where('id',$id)->update($data);

        session()->flash('success','Course Edit Successfully');
        return redirect('course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        session()->flash('success','course Dropped Successfully');
        return redirect('course');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Course::destroy(request('item'));
        }else{
            Course::find(request('item'))->delete();
        }
        session()->flash('success','Course Dropped Successfully');
        return redirect('course');
    }
}
