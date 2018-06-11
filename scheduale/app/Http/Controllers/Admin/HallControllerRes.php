<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HallDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Hall;
use App\Model\RegisterationTime;
use Validator;
use Gate;
class HallControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HallDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Hall.index',['title'=>'Hall Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Hall.create',['title'=>'Hall Create']);
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
                'capacity'   =>'required'
            ],[],
            ['title'=>'Title',
            'capacity'=>'Capacity']);



        Hall::create($data);

        session()->flash('success','Hall Added Successfully');
        return redirect('hall');
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
        $hall = Hall::find($id);
        return view('Hall.edit',['title'=>'Hall Edit','hall'=>$hall]);
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
                'capacity'   =>'required'
            ],[],
            [
                'title'=>'Title',
                'capacity'=>'Capacity']);


        Hall::where('id',$id)->update($data);

        session()->flash('success','Hall Updated Successfully');
        return redirect('hall');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hall::find($id)->delete();
        session()->flash('success','Hall Deleted Successfully');
        return redirect('hall');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Hall::destroy(request('item'));
        }else{
            Hall::find(request('item'))->delete();
        }
        session()->flash('success','Hall Deleted Successfully');
        return redirect('hall');
    }
}
