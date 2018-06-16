<?php

namespace App\Http\Controllers\Doctor;

use App\DataTables\gradesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Grades;
use App\Model\Year;
use Validator;

class gradecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(gradesDataTable $admin)
    {

        return $admin->render('Doctor.liststudent.index',['title'=>'Grades']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  intz  $id
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
        $user  = Grades::find($id);
        return view('Doctor.CRUDE.editE',['title'=>'Grade Edit','user'=>$user]);
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
            [   'course_title'=>'required',
                'student_name'=>'required',
                'calss_grade'=>'Nullable'],[],[
                'practical'=>'required',
                'final'=>'notRequiredField',
            ],[],[
                'course_title'=>'Course Nae',
                'student_name'=>'Student Name',
                'calss_grade'=>'Class Grade',
                'practical'=>'Practical',
                'final'=>'Final',
            ]);
        $data = request()->except(['_method','_token']);

        Grades::where('id',$id)->update($data);

        session()->flash('success','User Updated Successfully');
        return redirect('Grade');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
