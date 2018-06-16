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
Route::group(['namespace'=>'Algorithm'],function(){
    Route::get('/test', 'algorithmController@index');
    Route::get('query','QueryController@index');
    Route::get('query/algro','AlgrothimController@index');
    Route::get('query/halls','QueryController@halls');
    Route::get('query/workdays','QueryController@work_day');
    Route::get('query/doctor','QueryController@doctor');
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

    Route::resource('academic_degrees','AcademicDegreesControllerRes');
    Route::delete('academic_degrees/destroy/all','AcademicDegreesControllerRes@multi_delete');


    Route::resource('doctors','DoctorControllerRes');
    Route::delete('doctors/destroy/all','DoctorControllerRes@multi_delete');

    Route::resource('year','YearControllerRes');
    Route::delete('year/destroy/all','YearControllerRes@multi_delete');

    Route::resource('degrees','DegreeControllerRes');
    Route::delete('degrees/destroy/all','DegreeControllerRes@multi_delete');


    Route::resource('departments','DepartmentControllerRes');
    Route::delete('departments/destroy/all','DepartmentControllerRes@multi_delete');




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



Route::group(['middleware'=>'auth','namespace'=>'academic'],function (){

    Route::resource('add_gp','AddGpTeamControllerRes');
    Route::delete('add_gp/destroy/all','AddGpTeamControllerRes@multi_delete');

    Route::resource('edite_profile','editeprofileControllerRes');
    Route::delete('edite_profile/destroy/all','editeprofileControllerRes@multi_delete');


    Route::resource('approve_courses','ShowDoctorRequestsControllerRes');
    Route::delete('approve_courses/destroy/all','ShowDoctorRequestsControllerRes@multi_delete');

    Route::resource('change_courses','changecoursesControllerRes');
    Route::delete('change_courses/destroy/all','hangecoursesControllerRes@multi_delete');



});


Route::group(['middleware'=>'auth','namespace'=>'Doctor'],function (){




    Route::resource('Grade','gradecontroller');
    Route::delete('Grade/destroy/all','gradecontroller@multi_delete');

    Route::resource('courses','registercoursecontroller');
    Route::delete('courses/destroy/all','registercoursecontoller@multi_delete');

    Route::resource('Students List','studentlistcontroller');
    Route::delete('Students List/destroy/all','studentlistcontroller@multi_delete');

    Route::resource('Edit_info','personaldatacontroller');
    Route::delete('Edit info/destroy/all','personaldatacontroller@multi_delete');

    Route::resource('show request','showrequestcontroller');
    Route::delete('show request/destroy/all','showrequestcontroller@multi_delete');

});
