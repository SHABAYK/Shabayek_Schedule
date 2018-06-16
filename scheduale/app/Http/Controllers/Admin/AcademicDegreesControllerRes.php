<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AcademicDegreesDataTable;
use App\Http\Controllers\Controller;
use App\Model\Academic_Degree;
use Illuminate\Http\Request;
use App\Model\RegisterationTime;
use Validator;
use Gate;
class AcademicDegreesControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AcademicDegreesDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Academic_Degrees.index',['title'=>'Academic Degrees Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Academic_Degrees.create',['title'=>'Academic Degrees Create']);
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
                'degree'  =>'required',
                'priority'  =>'required',

            ],[],
            [
                'degree'=>'Degree',
                'priority'=>'Priority',

            ]);



        Academic_Degree::create($data);

        session()->flash('success','Academic Degrees Added Successfully');
        return redirect('academic_degrees');
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
        $academic = Academic_Degree::find($id);
        return view('Academic_Degrees.edit',['title'=>'Academic Degrees Edit','academic'=>$academic]);
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
                'degree'  =>'required',
                'priority'  =>'required',

            ],[],
            [
                'degree'=>'Degree',
                'priority'=>'Priority',

            ]);



        Academic_Degree::where('id',$id)->update($data);

        session()->flash('success','Academic Degrees Updated Successfully');
        return redirect('Academic_Degrees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Academic_Degree::find($id)->delete();
        session()->flash('success','Academic Degrees Deleted Successfully');
        return redirect('Academic_Degrees');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Academic_Degree::destroy(request('item'));
        }else{
            Academic_Degree::find(request('item'))->delete();
        }
        session()->flash('success','Academic Degrees Deleted Successfully');
        return redirect('Academic_Degrees');
    }
}
