<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\DepartmentDatatable;
use App\DataTables\StudentDataTable;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Department;
use App\User;
use Validator;
use Gate;
class StudentControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Student.std.index',['title'=>'Student Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_students = User::orderBy('id','desc')->where('type','student')->get();
        $all_departments = Department::orderBy('id','desc')->get();
        return view('Student.std.create',['title'=>'Student Create','all_students'=>$all_students,'all_departments'=>$all_departments]);
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
            ['credit_hours'=>'required',
            'entry_date'=>'required'],[],
            ['credit_hours'=>'Credit Hours',
            'entry_date'=>'Entry Date']);


        $user = User::find($request->input('user_id'));
        $data['user_id'] = $user->id;

        $department = Department::find($request->input('dept_id'));
        $data['dept_id'] = $department->id;

        Student::create($data);

        session()->flash('success','Student Added Successfully');
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
    public function edit($id)
    {
        $all_students = User::orderBy('id','desc')->where('type','student')->get();
        $all_departments = Department::orderBy('id','desc')->get();
        $student = Student::find($id);
        return view('Student.std.edit',['title'=>'Student Edit','student'=>$student,'all_students'=>$all_students,'all_departments'=>$all_departments]);
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
            ['credit_hours'=>'required',
                'entry_date'=>'required',],[],
            ['credit_hours'=>'Credit Hours',
                'entry_date'=>'Entry Date']);

        $student = User::find($request->input('user_id'));
        $data['user_id'] = $student->id;
        $department = Department::find($request->input('dept_id'));
        $data['dept_id'] = $department->id;
        Student::where('id',$id)->update($data);

        session()->flash('success','Student Updated Successfully');
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        session()->flash('success','Students Deleted Successfully');
        return redirect('students');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Student::destroy(request('item'));
        }else{
            Student::find(request('item'))->delete();
        }
        session()->flash('success','Student Deleted Successfully');
        return redirect('students');
    }
}
