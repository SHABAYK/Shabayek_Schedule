<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HiringInfoDataTable;
use App\Http\Controllers\Controller;
use App\Model\HiringInfo;
use App\Model\Academic_Degree;
use Illuminate\Http\Request;
use App\Model\RegisterationTime;
use Validator;
use Gate;
class HiringControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HiringInfoDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('HiringInfo.index',['title'=>'Hiring Info Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degrees = Academic_Degree::orderBy('id','asc')->get();
        return view('HiringInfo.create',['title'=>'Hiring Create','degrees'=>$degrees]);
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
                'academic_degrees_id'  =>'required',
                'hiring_date'   =>'required|date|date_format:Y-m-d|after:yesterday',
                'academic_last_degrees_id'   =>'',
                'last_date'   =>'',
                'academic__lastest_degrees_id'   =>'',
                'lastest_date'   =>'',
            ],[],
            [
                'academic_degrees_id'=>'Hiring Degree',
                'hiring_date'=>'Hiring Date',
                'academic_last_degrees_id'   =>'',
                'last_date'   =>'',
                'academic__lastest_degrees_id'   =>'',
                'lastest_date'   =>'',
            ]);



        HiringInfo::create($data);

        session()->flash('success','Hiring Added Successfully');
        return redirect('hiring');
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
        $degrees = Academic_Degree::orderBy('id','asc')->get();
        $hiring = HiringInfo::find($id);
        return view('HiringInfo.edit',['title'=>'Hiring Edit','hiring'=>$hiring,'degrees'=>$degrees]);
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
                'academic_degrees_id'  =>'required',
                'hiring_date'   =>'required|date|date_format:Y-m-d|after:yesterday',
                'academic_last_degrees_id'   =>'',
                'last_date'   =>'',
                'academic__lastest_degrees_id'   =>'',
                'lastest_date'   =>'',
            ],[],
            [
                'academic_degrees_id'=>'Hiring Degree',
                'hiring_date'=>'Hiring Date',
                'academic_last_degrees_id'   =>'',
                'last_date'   =>'',
                'academic__lastest_degrees_id'   =>'',
                'lastest_date'   =>'',
            ]);



        HiringInfo::where('id',$id)->update($data);

        session()->flash('success','Hiring Info Updated Successfully');
        return redirect('hiring');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HiringInfo::find($id)->delete();
        session()->flash('success','Hiring Info Deleted Successfully');
        return redirect('hiring');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            HiringInfo::destroy(request('item'));
        }else{
            HiringInfo::find(request('item'))->delete();
        }
        session()->flash('success','Hiring Info Deleted Successfully');
        return redirect('hiring');
    }
}
