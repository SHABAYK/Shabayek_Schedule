<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\UserType;
use Validator;
use Gate;

class UserControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }

        return $admin->render('admin.CRUD.index',['title'=>'User Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = UserType::orderBy('id','desc')->paginate(10);
        return view('admin.CRUD.create',['title'=>'User Create','types'=>$types]);
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
                'type'=>'required|in:admin,manager,academic,student,doctor',
                ],[],[
                'username'=>'UserName',
                'email'=>'Email',
                'password'=>'Password',
                'mobile'=>'Mobile',
                'type'=>'Type',
            ]);
        $type = UserType::find($request->input('user_type_id'));
        $data['user_type_id'] = $type->id;
        $data['password'] = bcrypt(request('password'));
        User::create($data);

        session()->flash('success','User Added Successfully');
        return redirect('user');
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
        $types = UserType::orderBy('id','desc')->paginate(10);
        $user  = User::find($id);
        return view('admin.CRUD.edit',['title'=>'User Edit','user'=>$user,'types'=>$types]);
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
                'type'=>'required|in:admin,manager,academic,doctor,student',
                ],[],[
                'name'=>'UserName',
                'email'=>'Email',
                'password'=>'Password',
                'mobile'=>'Mobile',
                'type'=>'Type',
            ]);
        $data = request()->except(['_method','_token']);
        $type = UserType::find($request->input('user_type_id'));
        $data['user_type_id'] = $type->id;
        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id',$id)->update($data);

        session()->flash('success','User Updated Successfully');
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success','User Deleted Successfully');
        return redirect('user');
    }
    public function multi_delete(){
        if (is_array(request('item'))){
            User::destroy(request('item'));
        }else{
            User::find(request('item'))->delete();
        }
        session()->flash('success','User Deleted Successfully');
        return redirect('user');
    }
}
