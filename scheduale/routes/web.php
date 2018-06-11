<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login','UserAuth@login');
Route::post('login','UserAuth@dologin');

Route::any('logout','UserAuth@logout');

Route::group(['middleware'=>'auth','namespace'=>'Admin'],function (){

    Route::resource('user','UserControllerRes');
    Route::delete('user/destroy/all','UserControllerRes@multi_delete');

    Route::resource('students','StudentControllerRes');
    Route::delete('students/destroy/all','StudentControllerRes@multi_delete');

    Route::resource('faculty_course','FacultyCourseControllerRes');
    Route::delete('faculty_course/destroy/all','FacultyCourseControllerRes@multi_delete');

    Route::resource('research_area','ResearchAreaControllerRes');
    Route::delete('research_area/destroy/all','ResearchAreaControllerRes@multi_delete');

    Route::resource('hall','HallControllerRes');
    Route::delete('hall/destroy/all','HallControllerRes@multi_delete');

    Route::resource('hiring','HiringControllerRes');
    Route::delete('hiring/destroy/all','HiringControllerRes@multi_delete');


    Route::resource('doctors','DoctorControllerRes');
    Route::delete('doctors/destroy/all','DoctorControllerRes@multi_delete');

    Route::resource('year','YearControllerRes');
    Route::delete('year/destroy/all','YearControllerRes@multi_delete');

    Route::resource('degrees','DegreeControllerRes');
    Route::delete('degrees/destroy/all','DegreeControllerRes@multi_delete');


    Route::resource('departments','DepartmentControllerRes');
    Route::delete('departments/destroy/all','DepartmentControllerRes@multi_delete');

    Route::get('query','QueryController@index');
    Route::get('query/algro','AlgrothimController@index');
    Route::get('query/halls','QueryController@halls');
    Route::get('query/workdays','QueryController@work_day');

});
Route::group(['middleware'=>'auth','namespace'=>'Manager'],function (){

    Route::resource('registration_time','RegTimeControllerRes');
    Route::delete('registration_time/destroy/all','RegTimeControllerRes@multi_delete');

    Route::resource('semester','SemesterControllerRes');
    Route::delete('semester/destroy/all','SemesterControllerRes@multi_delete');

    Route::resource('course','CourseControllerRes');
    Route::delete('course/destroy/all','CourseControllerRes@multi_delete');

    Route::resource('work_day','WorkDayControllerRes');
    Route::delete('work_day/destroy/all','WorkDayControllerRes@multi_delete');

});

Route::group(['middleware'=>'auth','namespace'=>'Student'],function (){

    Route::resource('std','StudentSetting');
});
