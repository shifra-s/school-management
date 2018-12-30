<div class="panel panel-default" id="edit-course-form">
        <div class="panel-heading">
            <h4>Edit Course </h4>
        </div>
        <div class="panel-body">    
            <form action="/save-edited-course" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="course-name">Name</label>
                    <input type="text" class="form-control" id="edit-course-name" name="name" value="{{$course->name}}" placeholder="Enter Name">
                    <input type="hidden" id="course-id" name="course_id" value="{{$course->id}}">
                </div>
                <div class="form-group">
                    <label for="course-description">Course Description</label>
                    <textarea class="form-control" id="edit-course-description" name="description">{{$course->description}}</textarea>
                </div>
                <div class="form-group">
                        <label for="course-img">Photo</label>
                        <input type="file" id="edit-course-img" name="image">
                </div>
                <div>
                    There are a total of {{$numberStudentsRegistered}} students registered!
                </div>
                <div>
                    <input type="submit" class="btn btn-success" value="Update">
                    @if($numberStudentsRegistered == 0)
                    <button type="button" class="btn btn-danger" id="delete-course-btn" data-info="{{ json_encode(['id' => $course->id, 'name' => $course->name]) }}">Delete</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

