<?php
/**
 * Created by PhpStorm.
 * User: 7oor
 * Date: 4/15/2018
 * Time: 5:16 PM
 */

namespace app\Http\Controllers\Doctor;
use App\DataTables\listStudentDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Semester;
use App\Model\RegisterationTime;
use App\User;
use Validator;

class studentlistcontroller
{

    public function index(listStudentDataTable $admin)
    {
        return $admin->render('Doctor.liststudent.index',['title'=>'Grades']);
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
        //
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
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

}