<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ResearchAreaDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ResearchArea;
use App\Model\RegisterationTime;
use Validator;
use Gate;
class ResearchAreaControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResearchAreaDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('ResarchArea.index',['title'=>'Research Area Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ResarchArea.create',['title'=>'Research Area Create']);
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
                'specialization_major'  =>'required',
            ],[],
            [
                'specialization_major'=>'Specialization Major'
            ]);



        ResearchArea::create($data);

        session()->flash('success','Research Area Added Successfully');
        return redirect('research_area');
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
        $research = ResearchArea::find($id);
        return view('ResarchArea.edit',['title'=>'Research Area Edit','research'=>$research]);
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
                'specialization_major'  =>'required',
            ],[],
            [
                'specialization_major'=>'Specialization Major'
            ]);

        ResearchArea::where('id',$id)->update($data);

        session()->flash('success','Research Area Updated Successfully');
        return redirect('research_area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResearchArea::find($id)->delete();
        session()->flash('success','Research Area Deleted Successfully');
        return redirect('research_area');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            ResearchArea::destroy(request('item'));
        }else{
            ResearchArea::find(request('item'))->delete();
        }
        session()->flash('success','Research Area Deleted Successfully');
        return redirect('research_area');
    }
}
