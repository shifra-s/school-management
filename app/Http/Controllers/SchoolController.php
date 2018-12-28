<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //ask someone where these three come from
use \App\Models\Course;
use \App\Models\Student;


use App\Http\Requests;

class SchoolController extends Controller
{
    public function index(){
        $courses = Course::get(); //shouldnt this technically be done from courses controller? 
        
        $students = \DB::select("select * from students"); //can also be done like this (like a regular SQL query)

        $countCourses = Course::count();

        $countStudents = Student::count();

        return view('schools.index', compact('courses', 'students', 'countCourses', 'countStudents'));
    }

}
