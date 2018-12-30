@extends('layouts.app')
@section('content')


    <div class="col-md-12">
        <!--list all courses -->
        <div class="col-md-3">
            <h4>Courses <i class="fa fa-plus" id="add-course"></i></h4>
            @if(count($courses))
                <table class="table" id="course-table">
                    <thead>
                    <!--
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    </tr>-->
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr class="course" data-id="{{$course->id}} id="course-{{$course->id}}">
                            <td><img width="100" height="100" class="img-thumbnail" src="uploads/{{$course->image}}">
                            </td>
                            <td>{{$course->name}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <strong>No courses found</strong>
            @endif
        </div>

        <!--list all students -->
        <div class="col-md-3">
            <h4>Students <i class="fa fa-plus" id="add-student"></i></h4>
            @if(count($students))
                <table class="table" id="student-table">
                    <thead>
                    <!--<tr>
                    <th>ID</th>
                    <th>Name</th>
                    </tr>-->
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="student" data-id="{{$student->id}}" id="student-{{$student->id}}">
                            <td><img width="100" height="100" class="img-thumbnail" src="uploads/{{$student->image}}">
                            </td>
                            <td>{{$student->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <strong>No students found</strong>
            @endif

        </div>

        <div class="col-md-6">

            <!-- Show the number of courses and students -->
            <div id="info-wrapper">
                <div class="panel panel-default" id="general-info-school">
                    <div class="panel-heading">
                        <h4>General Info</h4>
                    </div>
                    <div class="panel-body">
                        @if ($countCourses == 0)
                            <?php echo 'There are no courses'; ?>
                        @elseif ($countCourses == 1)
                            <?php echo 'There is 1 course'; ?>
                        @else
                            <?php echo 'There are ' . $countCourses . ' courses' ?>
                        @endif
                        @if ($countStudents == 0)
                            <?php echo 'and no students'; ?>
                        @elseif ($countStudents == 1)
                            <?php echo 'and 1 student'; ?>
                        @else
                            <?php echo 'and ' . $countStudents . ' students!' ?>
                        @endif
                        <div>
                            Please select a student or course from the list to view/edit the details.
                        </div>
                    </div>
                </div>
                @include('schools.add-student')
                @include('courses.add-course')
                <div id="student-details-section" style="display: none">

                </div>
            </div>

            <!--display server-side errors-->
        @foreach($errors->all() as $error) <!-- not so sure how and if to display validations done on server side -->
            <ul>
                <li>{{$error}}</li>
            </ul>
            @endforeach

        </div>

    </div>
@endsection

@push('scripts')
    <script>


    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/scripts/add-student.js"></script>
    <script src="/scripts/add-course.js"></script>
    <script src="/scripts/show-student.js"></script>
    <script src="/scripts/show-course.js"></script>
    <script src='/scripts/validations.js'></script>
    <script src='/scripts/delete-student.js'></script>
    <script src='/scripts/delete-course.js'></script>


@endpush


@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endpush

