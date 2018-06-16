<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\YearDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Year;
use App\User;
use Validator;
use Gate;
class YearControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(YearDataTable $admin)
    {
        if (!Gate::allows('isAdmin')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Year.index',['title'=>'Year Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Year.create',['title'=>'Year Create']);
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
            ['year'=>'required'],[],
            ['year'=>'Name']);


        Year::create($data);

        session()->flash('success','Year Added Successfully');
        return redirect('year');
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
        $year = Year::find($id);
        return view('year.edit',['title'=>'Year Edit','year'=>$year]);
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
            ['year'=>'required'],[],
            ['year'=>'Name']);


        Year::where('id',$id)->update($data);

        session()->flash('success','Year Updated Successfully');
        return redirect('year');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Year::find($id)->delete();
        session()->flash('success','Year Deleted Successfully');
        return redirect('year');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            Year::destroy(request('item'));
        }else{
            Year::find(request('item'))->delete();
        }
        session()->flash('success','Year Deleted Successfully');
        return redirect('year');
    }
}
