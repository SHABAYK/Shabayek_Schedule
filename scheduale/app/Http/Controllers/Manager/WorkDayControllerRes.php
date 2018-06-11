<?php

namespace App\Http\Controllers\Manager;

use App\DataTables\WorkDayDataTable;
use App\Http\Controllers\Controller;
use App\Model\Year;
use Illuminate\Http\Request;
use App\Model\WorkDay;
use App\Model\DayOfWeak;
use App\User;
use Validator;
use Gate;
class WorkDayControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WorkDayDataTable $admin)
    {
        if (!Gate::allows('isManager')){
            abort('404',"Sorry, You can do this actions");
        }
        return $admin->render('Manager.Work Day.index',['title'=>'Work Day Controller']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_days = DayOfWeak::orderBy('id','asc')->get();
        return view('Manager.Work Day.create',['title'=>'Work Day Create','all_days'=>$all_days]);
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
                'start_at'  =>'required',
                'end_at'  =>'required',
                'day_week_id'   =>'required'
            ],[],
            ['start_at'=>'Start',
            'end_at'=>'End',
            'day_week_id'=>'Day']);


        $day = DayOfWeak::find($request->input('day_week_id'));
        $data['day_week_id'] = $day->id;

        WorkDay::create($data);

        session()->flash('success','Work Day Added Successfully');
        return redirect('work_day');
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
        $all_days = DayOfWeak::orderBy('id','asc')->get();
        $work = WorkDay::find($id);
        return view('Manager.Work Day.edit',['title'=>'Work Day Edit','work'=>$work,'all_days'=>$all_days]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {$data = $this->validate(request(),
        [
            'start_at'  =>'required',
            'end_at'  =>'required',
            'day_week_id'   =>'required'
        ],[],
        ['start_at'=>'Start',
            'end_at'=>'End',
            'day_week_id'=>'Day']);


        $day = DayOfWeak::find($request->input('day_week_id'));
        $data['day_week_id'] = $day->id;

        WorkDay::where('id',$id)->update($data);

        session()->flash('success','Work Day Updated Successfully');
        return redirect('work_day');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkDay::find($id)->delete();
        session()->flash('success','Work Day Deleted Successfully');
        return redirect('work_day');
    }

    public function multi_delete(){
        if (is_array(request('item'))){
            WorkDay::destroy(request('item'));
        }else{
            WorkDay::find(request('item'))->delete();
        }
        session()->flash('success','Work Day Deleted Successfully');
        return redirect('work_day');
    }
}
