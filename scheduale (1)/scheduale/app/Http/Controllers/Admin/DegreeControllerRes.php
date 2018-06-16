<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DegreeDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Degree;
use App\Model\Doctor;
use App\Model\ResearchArea;
use Validator;
use Gate;
class DegreeControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DegreeDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Degree.index',['title'=>'Degree Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $all_doctors = Doctor::orderBy('id','desc')->get();
        $all_researchs = ResearchArea::orderBy('id','desc')->get();
        return view('Degree.create',['title'=>'Degree Create','all_doctors'=>$all_doctors,'all_researchs'=>$all_researchs]);
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
                'doctor_id'=>'required',
                'research_area_id'=>'required'
            ],[],
            [
                'doctor_id'=>'Doctor ID',
                'research_area_id'=>'Research Area Id'
            ]);

        $doctor = Doctor::find($request->input('doctor_id'));
        $data['doctor_id'] = $doctor->id;

        $research = ResearchArea::find($request->input('research_area_id'));
        $data['research_area_id'] = $research->id;


        Degree::create($data);


        session()->flash('success','Degree Added Successfully');
        return redirect('degrees');
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
        $all_doctors = Doctor::orderBy('id','desc')->get();
        $all_researchs = ResearchArea::orderBy('id','desc')->get();
        $degree = Degree::find($id);
        return view('Degree.edit',['title'=>'Degree Edit','all_doctors'=>$all_doctors,'all_researchs'=>$all_researchs,'degree'=>$degree]);
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
                'doctor_id'=>'required',
                'research_area_id'=>'required'
            ],[],
            [
                'doctor_id'=>'Doctor ID',
                'research_area_id'=>'Research Area Id'
            ]);

        $doctor = Doctor::find($request->input('doctor_id'));
        $data['doctor_id'] = $doctor->id;

        $research = ResearchArea::find($request->input('research_area_id'));
        $data['research_area_id'] = $research->id;


        Degree::where('id',$id)->update($data);

        session()->flash('success','Degree Updated Successfully');
        return redirect('degrees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Degree::find($id)->delete();
        session()->flash('success','Degree Deleted Successfully');
        return redirect('degrees');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Degree::destroy(request('item'));
        }else{
            Degree::find(request('item'))->delete();
        }
        session()->flash('success','Degree Deleted Successfully');
        return redirect('degrees');
    }
}
