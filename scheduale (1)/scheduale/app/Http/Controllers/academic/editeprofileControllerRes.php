<?php

namespace App\Http\Controllers\academic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\users;


use Illuminate\Support\Facades\Auth;
use Validator;

class editeprofileControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $user  = Auth::User();
        return view('academic.CRUD.edit',['title'=>'Edit info','user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            [   'username'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
                'mobile'=>'required',

            ],[],[
                'username'=>'UserName',
                'email'=>'Email',
                'password'=>'Password',
                'mobile'=>'Mobile',

            ]);


        $data['password'] = bcrypt(request('password'));
        users::create($data);

        session()->flash('success','User Added Successfully');
return back();
        
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
                'password'=>'required|min:6'],[],[
                'mobile'=>'required',

            ],[],[
                'name'=>'UserName',
                'email'=>'Email',
                'password'=>'Password',
                'mobile'=>'Mobile',

            ]);
        $data = request()->except(['_method','_token']);


        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        users::where('id',$id)->update($data);

        session()->flash('success','User Updated Successfully');
        return back();

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
