<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\QueryController;

class AlgrothimController extends Controller
{
    public function index(){
        $course = new QueryController;
        $course->index->courses;
        print_r($course) ;
    }
}
