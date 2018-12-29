<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Student;
use \App\Models\Course;
use \App\Models\CourseStudent;

use App\Http\Requests\StudentSaveRequest;

use App\Http\Requests;

class StudentsController extends Controller
{
    //store new student info in db
    public function store(StudentSaveRequest $request)
    {
        // StudentSaveRequest has the validations - automatically checks the validations. redirects back to the same page if didnt pass
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

        $student = new Student;
        $student->fill(array_except($request->all(), ['_token', 'image', 'courses']));
        if (isset($filename)) {
            $student->image = $filename . '.' . $extension;
        }


        $student->save();

        $this->saveCourseRegistration($request->courses, $student->id);

        return redirect()->back();

    }
    // PSR2
    private function saveCourseRegistration($courses, $studentId)
    {
        foreach ($courses as $course) {
            CourseStudent::create([
                "student_id" => $studentId,
                "course_id" => $course,
            ]);
        }
    }

    //show info of any selected student
    public function show($id)
    {
        //$student = Student::where('id', $id)->first();
        $student = Student::find($id)->with('courses.course')->get();
        $courses = Course::get();

        //foreach ($student as $studentRelation) {
            //dd($studentRelation);
            //foreach ($studentRelation->courses as $courses) {
               // dd($courses->course);
            //}

       //}


        return view('schools.student-details', compact('student', 'courses'));
    }

    //save data of new student (if edited)
    public function updateStudent(Request $request)
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

        $currentStudent = Student::find($request->student_id); //find current student
        $currentStudent->fill(array_except($request->all(), ['_token', 'image', 'student_id', 'courses'])); //not saving these two fields in the array (implicitly)
        if (isset($filename)) {
            $currentStudent->image = $filename . '.' . $extension;
        }
        //dd($request->all());
        $currentStudent->save();



        $this->saveCourseRegistration($request->courses, $currentStudent->id);

        return redirect()->back();
    }


    public function delete($id)
    {
        try {
            $student = Student::find($id);
            $studentRelation = CourseStudent::where('student_id',$id)->get();

            if ($student) {
                $student->delete();
                $studentRelation->delete();
            }
            $count = Student::count();
            //return json encoded array
            return json_encode(['status' => 'success', 'id' => $id, 'remaining' => $count]);
        } catch (\Exception $e) {
            return json_encode(['status' => 'error']);
        }
    }


    public function showEdit($id)
    {
        $courses = Course::get();
        $student = Student::find($id);
        $courseStudents = CourseStudent::where('student_id', $id)->get();
        //dd($courseStudents->count());


        return view('schools.edit-student', compact('student','courses', 'courseStudents' ));
    }
}

