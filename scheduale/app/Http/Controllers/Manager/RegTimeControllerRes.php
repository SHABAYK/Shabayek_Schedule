<?php

namespace App\Http\Controllers\Manager;
use App\DataTables\RegisterTimeDataTable;
use App\Http\Controllers\Controller;
use App\Model\RegisterationTime;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Gate;
class RegTimeControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RegisterTimeDataTable $admin)
    {
        if (!Gate::allows('isManager')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Manager.RegisterTime.index',['title'=>'Register Time Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Manager.RegisterTime.create',['title'=>'Register Time Create']);
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
                'start_regstudent_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'end_regstudent_date'=>'required|date|date_format:Y-m-d|after:start_regstudent_date',
                'start_regdoctor_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'end_regdoctor_date'=>'required|date|date_format:Y-m-d|after:start_regdoctor_date',
                'start_semester_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'end_semester_date'=>'required|date|date_format:Y-m-d|after:start_semester_date',

            ],[],
            [
                'start_regstudent_date'=>'Start Register Student Date',
                'end_regstudent_date'=>'End Register Student Date',
                'start_regdoctor_date'=>'Start Register Doctor Date',
                'end_regdoctor_date'=>'End Register Doctor Date',
                'start_semester_date'=>'Start Semester Date',
                'end_semester_date'=>'End Semester Date',

            ]);


        RegisterationTime::create($data);

        session()->flash('success','Register Time Added Successfully');
        return redirect('registration_time');
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
        $registertime = RegisterationTime::find($id);
        return view('Manager.RegisterTime.edit',['title'=>'Register Time Edit','registertime'=>$registertime]);
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
                'start_regstudent_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'end_regstudent_date'=>'required|date|date_format:Y-m-d|after:start_regstudent_date',
                'start_regdoctor_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'end_regdoctor_date'=>'required|date|date_format:Y-m-d|after:start_regdoctor_date',
                'start_semester_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'end_semester_date'=>'required|date|date_format:Y-m-d|after:start_semester_date',

            ],[],
            [
                'start_regstudent_date'=>'Start Register Student Date',
                'end_regstudent_date'=>'End Register Student Date',
                'start_regdoctor_date'=>'Start Register Doctor Date',
                'end_regdoctor_date'=>'End Register Doctor Date',
                'start_semester_date'=>'Start Semester Date',
                'end_semester_date'=>'End Semester Date',

            ]);

        RegisterationTime::where('id',$id)->update($data);

        session()->flash('success','Register Time Updated Successfully');
        return redirect('registration_time');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegisterationTime::find($id)->delete();
        session()->flash('success','Register Time Deleted Successfully');
        return redirect('registration_time');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            RegisterationTime::destroy(request('item'));
        }else{
            RegisterationTime::find(request('item'))->delete();
        }
        session()->flash('success','Register Time Deleted Successfully');
        return redirect('registration_time');
    }
}
