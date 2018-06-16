<?php

namespace App\Http\Controllers\academic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\student;
use App\Model\doctor;
use App\User;
use App\Model\graduationproject;
use Illuminate\Support\Facades\Auth;
use Validator;

class AddGpTeamControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = Auth::User();
        return view('gp.CRUD.create',['title'=>'ADD GP TEAM','user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_students = User::orderBy('id','desc')->where('type','student')->get();
        $all_doctors = User::orderBy('id','desc')->where('type','doctor')->get();
        $all_details = graduationproject::orderBy('id','desc')->get();

        return view('gp.CRUD.create',['title'=>'ADD GP TEAM','all_students'=>$all_students,'all_doctors'=>$all_doctors,'all_details'=>$all_details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*/$data = $this->validate(request(),
            ['credit_hours'=>'required',
            'entry_date'=>'required'],[],
            ['credit_hours'=>'Credit Hours',
            'entry_date'=>'Entry Date']);
/*/

        $students = User::find($request->input('user_id'));
        $data['user_id'] = $user->id;

        $doctors = User::find($request->input('user_id'));
        $data['user_id'] = $user->id;

       graduationproject::create($data);

        session()->flash('success','TEAM Added Successfully');
        return redirect('students');
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
    public function edit()
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
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function multi_delete()
    {
        //
    }
}
