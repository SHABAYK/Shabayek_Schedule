<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\DoctorDataTable;
use App\Http\Controllers\Controller;
use App\Model\HiringInfo;
use Illuminate\Http\Request;
use App\Model\Doctor;
use App\Model\Department;
use App\User;
use Validator;
use Gate;
class DoctorControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Doctor.doc.index',['title'=>'Doctor Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_doctors = User::orderBy('id','desc')->where('type','doctor')->get();
        $all_departments = Department::orderBy('id','desc')->get();
        $all_hirings = HiringInfo::orderBy('id','desc')->get();
        return view('Doctor.doc.create',['title'=>'Doctor Create','all_doctors'=>$all_doctors,'all_departments'=>$all_departments,'all_hirings'=>$all_hirings]);
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
                'user_id'=>'required',
                'dept_id'=>'required',
                'hiring_info_id'=>'required',
            ],[],
            [
                'user_id'=>'User Id',
                'dept_id'=>'Dept Id',
                'hiring_info_id'=>'Hiring Info Id',
            ]);


        $user = User::find($request->input('user_id'));
        $data['user_id'] = $user->id;

        $department = Department::find($request->input('dept_id'));
        $data['dept_id'] = $department->id;

        $hiring = HiringInfo::find($request->input('hiring_info_id'));
        $data['hiring_info_id'] = $hiring->id;

        Doctor::create($data);

        session()->flash('success','Doctor Added Successfully');
        return redirect('doctors');
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
        $all_doctors = User::orderBy('id','desc')->where('type','doctor')->get();
        $all_departments = Department::orderBy('id','desc')->get();
        $all_hirings = HiringInfo::orderBy('id','desc')->get();
        $doctor = Doctor::find($id);
        return view('Doctor.doc.edit',['title'=>'Doctor Edit','all_doctors'=>$all_doctors,'all_departments'=>$all_departments,'all_hirings'=>$all_hirings,'doctor'=>$doctor]);
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
                'user_id'=>'required',
                'dept_id'=>'required',
                'hiring_info_id'=>'required',
            ],[],
            [
                'user_id'=>'User Id',
                'dept_id'=>'Dept Id',
                'hiring_info_id'=>'Hiring Info Id',
            ]);


        $user = User::find($request->input('user_id'));
        $data['user_id'] = $user->id;

        $department = Department::find($request->input('dept_id'));
        $data['dept_id'] = $department->id;

        $hiring = HiringInfo::find($request->input('hiring_info_id'));
        $data['hiring_info_id'] = $hiring->id;

        Doctor::where('id',$id)->update($data);

        session()->flash('success','Doctor Updated Successfully');
        return redirect('doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Doctor::find($id)->delete();
        session()->flash('success','Doctor Deleted Successfully');
        return redirect('doctors');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Doctor::destroy(request('item'));
        }else{
            Doctor::find(request('item'))->delete();
        }
        session()->flash('success','Doctor Deleted Successfully');
        return redirect('doctors');
    }
}
