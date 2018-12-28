<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();
Route::group(['middleware' => 'auth'], function() {


Route::get('/home', 'HomeController@index');

Route::get('/schools', 'SchoolController@index');

Route::get('/course/add', 'CourseController@index');

Route::get('/administrators', 'AdministratorsController@index');

Route::post('/add-new-admin', 'AdministratorsController@store');

Route::post('/add-new-student', 'StudentsController@store');

Route::post('/add-new-course', 'CourseController@store');


Route::get('student/{id}', 'StudentsController@show');

Route::get('course/{id}', 'CourseController@show');

Route::get('admin/{id}', 'AdministratorsController@show');

Route::get('student/edit/{id}', 'StudentsController@showEdit');

Route::get('course/edit/{id}', 'CourseController@showEdit');

Route::get('admin/edit/{id}', 'AdministratorsController@showEdit');


//need to recall why I did this in the route
Route::get('check', function(){

    return \Auth::user()->roles->name;
    $user = App\Models\Student::with('courses.course')->find(1);
    return $user;
});

Route::post('/save-edited-admin', 'AdministratorsController@updateAdmin');

Route::post('/save-edited-student', 'StudentsController@updateStudent');

Route::post('/save-edited-course', 'CourseController@updateCourse');

Route::post('student/delete/{id}', 'StudentsController@delete');

Route::post('course/delete/{id}', 'CourseController@delete');

Route::post('admin/delete/{id}', 'AdministratorsController@delete');

});



