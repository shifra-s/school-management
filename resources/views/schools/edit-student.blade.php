<div class="panel panel-default" id="edit-student-form">
        <div class="panel-heading">
            <h4>Edit Student </h4>
        </div>
        <div class="panel-body">    
            <form action="/save-edited-student" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="student-name">Name</label>
                    <input type="text" class="form-control" id="edit-student-name" name="name" value="{{$student->name}}" placeholder="Enter Name">
                    <input type="hidden" id="student-id" name="student_id" value="{{$student->id}}">
                </div>
                <div class="form-group">
                    <label for="student-number">Phone Number</label>
                    <input type="text" class="form-control" id="edit-student-number" name="phone" value="{{$student->phone}}" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="student-email">Email</label>
                    <input type="text" class="form-control" id="edit-student-email" name="email" value="{{$student->email}}" placeholder="Enter Email">
                </div>
                <div class="form-group">
                        <label for="student-img">Photo</label>
                        <input type="file" id="edit-student-img" name="image">
                    </div>
                <div>
                <div class="form-group col-md-12">
                    @foreach ($courses as $course)
                        <div class="col-md-4">
                            <label for="courses"> <img class="img-thumbnail registered-course-img" src="uploads/{{$course->image}}"> {{$course->name}}</label>
                            @if($courseStudents->count() > 0)
                                @foreach($courseStudents as $courseStudent)

                                    @if($course->id == $courseStudent->course_id)
                                        <input type="checkbox" id="course-{{$course->id}}" name="courses[]" value="{{ $course->id }}" checked>
                                    @else
                                        <input type="checkbox" id="course-{{$course->id}}" name="courses[]" value="{{ $course->id }}">
                                    @endif
                                @endforeach
                            @else
                                <input type="checkbox" id="course-{{$course->id}}" name="courses[]" value="{{ $course->id }}">
                            @endif
                        </div>
                        <div class="col-md-1">
                        </div>
                    @endforeach
                </div>
                <div>
                    <input type="submit" class="btn btn-success" id="update-student-btn" value="Update">
                    <button type="button" class="btn btn-danger" id="delete-student-btn" data-info="{{ json_encode(['id' => $student->id, 'name' => $student->name]) }}">Delete</button>
                </div>
            </form>
        </div>
    </div>
