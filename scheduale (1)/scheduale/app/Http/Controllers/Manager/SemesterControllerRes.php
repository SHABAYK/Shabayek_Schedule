<?php

namespace App\Http\Controllers\Manager;

use App\DataTables\SemesterDataTable;
use App\Http\Controllers\Controller;
use App\Model\Year;
use Illuminate\Http\Request;
use App\Model\Semester;
use App\Model\RegisterationTime;
use App\User;
use Validator;
use Gate;
class SemesterControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SemesterDataTable $admin)
    {
        if (!Gate::allows('isManager')){
        abort('404',"Sorry, You can do this actions");
    }
        return $admin->render('Manager.Semester.index',['title'=>'Semester Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_registers = RegisterationTime::orderBy('id','desc')->get();
        $all_years = Year::orderBy('id','desc')->get();
        return view('Manager.Semester.create',['title'=>'Semester Create','all_registers'=>$all_registers,'all_years'=>$all_years]);
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
                'title'  =>'required',
                'year_id'   =>'required',
                'registertime_id'   =>'required|unique:semesters',
            ],[],
            ['title'=>'Title',
            'year_id'=>'Year',
            'registertime_id'=>'Registeration Time Is duplicate',

                ]);


        $reister = RegisterationTime::find($request->input('registertime_id'));
        $data['registertime_id'] = $reister->id;

        $year = Year::find($request->input('year_id'));
        $data['year_id'] = $year->id;

        Semester::create($data);

        session()->flash('success','Semester Added Successfully');
        return redirect('semester');
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
        $all_registers = RegisterationTime::orderBy('id','desc')->get();
        $all_years = Year::orderBy('id','desc')->get();
        $semester = Semester::find($id);
        return view('Manager.Semester.edit',['title'=>'Semester Edit','semester'=>$semester,'all_registers'=>$all_registers,'all_years'=>$all_years]);
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
                'title'  =>'required',
                'year_id'   =>'required',
                'registertime_id'   =>'required|unique:semesters',
            ],[],
            ['title'=>'Title',
                'year_id'=>'Year',
                'registertime_id'=>'Registeration Time Is duplicate',s
                ]);


        $reister = RegisterationTime::find($request->input('registertime_id'));
        $data['registertime_id'] = $reister->id;

        $year = Year::find($request->input('year_id'));
        $data['year_id'] = $year->id;

        Semester::where('id',$id)->update($data);

        session()->flash('success','Semester Updated Successfully');
        return redirect('semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Semester::find($id)->delete();
        session()->flash('success','Semester Deleted Successfully');
        return redirect('semester');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Semester::destroy(request('item'));
        }else{
            Semester::find(request('item'))->delete();
        }
        session()->flash('success','Semester Deleted Successfully');
        return redirect('semester');
    }
}
