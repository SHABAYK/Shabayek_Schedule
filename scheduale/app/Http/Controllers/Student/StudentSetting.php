<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\UserType;
use Validator;
use Gate;

class StudentSetting extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('isStudent')){
            abort('404',"Sorry, You can do this actions");
        }
        return view('Student.Profile.home');
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
        $student = User::find($id);
        $title = 'Student Setting';
        return view('Student.Profile.setting',['student'=>$student,'title'=>$title]);
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
            [   'username'=>'required',
                'email'=>'required|email|unique:users,email,'.$id,
                'password'=>'required|min:6',
                'mobile'=>'required',
                ],[],[
                'name'=>'UserName',
                'email'=>'Email',
                'password'=>'Password',
                'mobile'=>'Mobile',
            ]);
       /* $data = request()->except(['_method','_token']);*/
       /* $type = UserType::find($request->input('user_type_id'));
        $data['user_type_id'] = $type->id;*/
       /* $data['dept_id'] = auth()->user()->user_id()->first()->dept_id()->first()->id;*/
        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id',$id)->update($data);

        session()->flash('success','Student Updated Successfully');
        return redirect('std');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
