<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Course;
use \App\Models\CourseStudent;


use App\Http\Requests;
use App\Http\Requests\CourseSaveRequest;


class CourseController extends Controller
{
    public function addCourse()
    {
        return view('courses.add');
    }

    //store new course
    public function store(CourseSaveRequest $request)
    {
        //return $request->all();
        if ($request->file('image')) {
            //check if your form sent some data
            // list of extensions allowed to be uploaded
            $allowedext = array("png", "jpg", "jpeg", "gif");
            //store the file received from the form in a var
            $photo = $request->file('image');
            //set destination path where you will store your photo
            $destinationPath = public_path() . '/uploads';
            //generate random filename
            $filename = str_random(12);
            //get the extension of the file uploaded by the user
            $extension = $photo->getClientOriginalExtension();
            //validate if the user supplied file's extension matches allowed extension
            if (in_array($extension, $allowedext)) {
                //if every thing goes fine move the file
                $request->file('image')->move($destinationPath, $filename . '.' . $extension);
            }

        }

        $course = new Course;
        $course->fill(array_except($request->all(), ['_token', 'image']));
        if($request->file('image')){
            $course->image = $filename . '.' . $extension;
        }
        $course->save();

        return redirect()->back();
    }

    //show info of any selected course
    public function show($id)
    {
        $course = Course::find($id);

        return view('courses.course-details', compact('course'));

    }

    //save data of new course (if edited)
    public function updateCourse(Request $request)
    {
        if ($request->file('image')) {
            //check if your form sent some data
            // list of extensions allowed to be uploaded
            $allowedext = array("png", "jpg", "jpeg", "gif");
            //store the file received from the form in a var
            $photo = $request->file('image');
            //set destination path where you will store your photo
            $destinationPath = public_path() . '/uploads';
            //generate random filename
            $filename = str_random(12);
            //get the extension of the file uploaded by the user
            $extension = $photo->getClientOriginalExtension();
            //validate if the user supplied file's extension matches allowed extension
            if (in_array($extension, $allowedext)) {
                //if every thing goes fine move the file
                $request->file('image')->move($destinationPath, $filename . '.' . $extension);
            }

        }

        $currentCourse = Course::find($request->course_id); //find current course
        $currentCourse->fill(array_except($request->all(), ['_token', 'image', 'course_id'])); //not saving these two fields in the array (implicitly)

        if (isset($filename)) {
            $currentCourse->image = $filename . '.' . $extension;
        }
        $currentCourse->save();

        return redirect()->back();
    }


    public function showEdit($id)
    {
        $course = Course::find($id);

        $studentsRegistered = Course::where('id',$id)->with('students')->first();
        $numberStudentsRegistered = $studentsRegistered->students->count();

        return view('courses.edit-course', compact('course', 'numberStudentsRegistered'));
    }

    public function delete($id) {
        try {
            $course = Course::find($id);
            $courseRelation = CourseStudent::where('course_id', $id)->get();
           //find($$idid); id, student_id, course_id

            if ($course) {
                $course->delete();
                $courseRelation->delete();
            }
            $count = Course::count();
            //return json encoded array
            return json_encode(['status' => 'success', 'id' => $id, 'remaining' => $count]);
        } catch(\Exception $e) {
            return json_encode(['status' => 'error']);
        }
    }
}

