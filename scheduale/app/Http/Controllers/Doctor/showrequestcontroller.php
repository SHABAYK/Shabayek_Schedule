<?php
/**
 * Created by PhpStorm.
 * User: 7oor
 * Date: 6/11/2018
 * Time: 10:30 PM
 */

namespace app\Http\Controllers\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\doctor_request;
use App\Model\Department;
use App\Model\FacultyCourse;
use App\Model\Semester;
use App\Model\HiringInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use validator;

class showrequestcontroller extends Controller
{
    /**
     *
     */
    public function index()
    {
        $user =  Auth::user()->username;
        $data=doctor_request::where('doctor_name',$user);

        return view('Doctor.registercourses.show',['title'=>'Your Requests','data'=>$data]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Create()
    {

        /*  return view('Doctor.registercourses.create',['title'=>'Register CAOUTSES']);*/
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
            [   'course_title'=>'required'

            ],[],[
                ' course_title'=>'Course Title',

            ]);
        $type = doctor_request::find($request->input('course_title'));


        doctor_request::create($data);

        session()->flash('success','Register done Successfully');
        return redirect('courses');
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
        //
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
        //
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
