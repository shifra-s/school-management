<div class="panel panel-default" id="edit-student-form">
    <div class="panel-heading">
        <h4>Edit Student </h4>
    </div>
    <div class="panel-body">
        <form action="/save-edited-student" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="student-name">Name</label>
                <input type="text" class="form-control" id="edit-student-name" name="name" value="{{$student->name}}"
                       placeholder="Enter Name">
                <input type="hidden" id="student-id" name="student_id" value="{{$student->id}}">
            </div>
            <div class="form-group">
                <label for="student-number">Phone Number</label>
                <input type="text" class="form-control" id="edit-student-number" name="phone"
                       value="{{$student->phone}}" placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label for="student-email">Email</label>
                <input type="text" class="form-control" id="edit-student-email" name="email" value="{{$student->email}}"
                       placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="student-img">Photo</label>
                <input type="file" id="edit-student-img" name="image">
            </div>
            <div class="form-group col-md-12">


                @foreach($courses as $course)
                    <label for="courses">
                        <img class="img-thumbnail registered-course-img" src="uploads/{{$course->image}}"> {{$course->name}}
                    </label>
                    <input type="checkbox" id="course-{{$course->id}}" name="courses[]" value="{{ $course->id }}"
                       @foreach($courseStudent->courses as $studentCourse)
                           @if($course->id == $studentCourse->course->id)
                               checked="checked"
                           @endif
                       @endforeach
                    >
                @endforeach
            </div>
            <div>
                <input type="submit" class="btn btn-success" id="update-student-btn" value="Update">
                <button type="button" class="btn btn-danger" id="delete-student-btn"
                        data-info="{{ json_encode(['id' => $student->id, 'name' => $student->name]) }}">Delete
                </button>
            </div>
        </form>
    </div>
</div>
