<?php
namespace App\Http\Controllers\academic;
use App\DataTables\DoctorRequestsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\DoctorRequest;
use Validator;

class ShowDoctorRequestsControllerRes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorRequestsDataTable $admin)
    {

        return $admin->render('academic.CRUD.index',['title'=>'Requests']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        }

    /**
     * Display the specified resource.
     *
     * @param  intz  $id
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
        $user  = DoctorRequest::find($id);
        return view('ListRequest.CRUD.edit',['title'=>'requsts Edit','user'=>$user]);
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
            [   'doctor_name'=>'required',
                'course_title'=>'required',
                'state'=>'required',
            ],[],[
                'doctor_name'=>'Doctor Name',
                'course_title'=>'Course Title',
                'state'=>'State',
            ]);
        $data = request()->except(['_method','_token']);

        DoctorRequest::where('id',$id)->update($data);

        session()->flash('success','User Updated Successfully');
        return redirect('Grade');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}