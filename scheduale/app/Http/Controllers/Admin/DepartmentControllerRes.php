<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\DepartmentDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Department;
use App\User;
use Validator;
use Gate;
class DepartmentControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentDatatable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Department.dept.index',['title'=>'Department Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_advisors = User::orderBy('id','desc')->where('type','academic')->get();
        return view('Department.dept.create',['title'=>'Department Create','all_advisors'=>$all_advisors]);
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
            ['name'=>'required'],[],
            ['name'=>'Name']);

        $academic = User::find($request->input('academic_id'));
        $data['academic_id'] = $academic->id;
        Department::create($data);

        session()->flash('success','Department Added Successfully');
        return redirect('departments');
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
        $all_advisors = User::orderBy('id','desc')->where('type','academic')->get();
        $department = Department::find($id);
        return view('Department.dept.edit',['title'=>'Department Edit','department'=>$department,'all_advisors'=>$all_advisors]);
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
            ['name'=>'required'],[],[
                'name'=>'Name']);

        $academic = User::find($request->input('academic_id'));
        $data['academic_id'] = $academic->id;
        Department::where('id',$id)->update($data);

        session()->flash('success','Department Updated Successfully');
        return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        session()->flash('success','Departments Deleted Successfully');
        return redirect('departments');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Department::destroy(request('item'));
        }else{
            Department::find(request('item'))->delete();
        }
        session()->flash('success','Departments Deleted Successfully');
        return redirect('departments');
    }
}
