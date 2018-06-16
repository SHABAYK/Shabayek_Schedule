<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\DepartmentDatatable;
use App\DataTables\FacultyCourseDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FacultyCourse;
use App\Model\Department;
use App\Model\ResearchArea;
use Validator;
use Gate;
class FacultyCourseControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FacultyCourseDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Faculty Course.index',['title'=>'Faculty Course Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_prequisites = FacultyCourse::orderBy('id','asc')->get();
        $all_departments = Department::orderBy('id','desc')->get();
        $all_researchs = ResearchArea::orderBy('id','desc')->get();
        return view('Faculty Course.create',['title'=>'Faculty Course Create','all_prequisites'=>$all_prequisites,'all_departments'=>$all_departments,'all_researchs'=>$all_researchs]);
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
                'title'=>'required',
                'level'=>'required',
                'credit_hours'=>'required'
            ],[],
            [
                'title'=>'Title',
                'level'=>'Level',
                'credit_hours'=>'Credit Hours'
            ]);


        $research = ResearchArea::find($request->input('research_area_id'));
        $data['research_area_id'] = $research->id;

        if ($request->input('prerequisite_id') == null){

            $data['prerequisite_id'] = null;
        }else {
            $faculty = FacultyCourse::find($request->input('prerequisite_id'));
            $data['prerequisite_id'] = $faculty->id;
        }

        $department = Department::find($request->input('dept_id'));
        $data['dept_id'] = $department->id;

        FacultyCourse::create($data);

       /* $prerequisite = FacultyCourse::orderBy('id','desc')->get()->last();

        $data['prerequisite_id'] = $prerequisite['prerequisite_id'];
        FacultyCourse::where('id',$prerequisite['id'])->update($data);*/

        session()->flash('success','Faculty Course Added Successfully');
        return redirect('faculty_course');
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
        $all_prequisites = FacultyCourse::orderBy('id','asc')->get();
        $all_departments = Department::orderBy('id','desc')->get();
        $all_researchs = ResearchArea::orderBy('id','desc')->get();
        $faculty_course = FacultyCourse::find($id);
        return view('Faculty Course.edit',['title'=>'Faculty Course Edit','faculty_course'=>$faculty_course,'all_prequisites'=>$all_prequisites,'all_departments'=>$all_departments,'all_researchs'=>$all_researchs]);
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
                'title'=>'required',
                'level'=>'required',
                'credit_hours'=>'required'
            ],[],
            [
                'title'=>'Title',
                'level'=>'Level',
                'credit_hours'=>'Credit Hours'
            ]);

        $department = Department::find($request->input('dept_id'));
        $data['dept_id'] = $department->id;


        $research = ResearchArea::find($request->input('research_area_id'));
        $data['research_area_id'] = $research->id;

        if ($request->input('prerequisite_id') == null){

            $data['prerequisite_id'] = null;
        }else {
            $faculty = FacultyCourse::find($request->input('prerequisite_id'));
            $data['prerequisite_id'] = $faculty->id;
        }

        FacultyCourse::where('id',$id)->update($data);

        session()->flash('success','Faculty Course Updated Successfully');
        return redirect('faculty_course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FacultyCourse::find($id)->delete();
        session()->flash('success','Faculty Course Deleted Successfully');
        return redirect('faculty_course');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            FacultyCourse::destroy(request('item'));
        }else{
            FacultyCourse::find(request('item'))->delete();
        }
        session()->flash('success','Faculty Course Deleted Successfully');
        return redirect('faculty_course');
    }
}
