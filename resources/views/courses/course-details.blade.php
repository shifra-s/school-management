<div class="panel panel-default" id="course-details">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <h4>Course Details</h4>
            </div>
            @if(\Auth::user()->role !=3)
            <div class="col-md-6">
                <button class="btn btn-info pull-right course-edit" data-id="{{$course->id}}">Edit</button>
            </div>
            @endif
        </div>
    </div>
    <div class="panel-body course-details-body">
        <div class="col-md-12">
            <div class="col-md-3">
                <img class="img-thumbnail course-image" src="/uploads/{{$course->image}}">
            </div>
            <div class="col-md-9">
                <span class="course-name">{{$course->name}}</span>
            </div>
            <div class="col-md-9">
                <span class="course-description">{{$course->description}}</span>
            </div>
            <div class="col-md-12 col-xs-9">
                @if($course->students)
                    @foreach($course->students as $students)
                        <div class="row" id="students">
                            @if(isset($students->student) && !is_null($students->student)) <!--check to make sure there are students signed up-->
                                <div class="col-md-6 col-xs-9">
                                    <img class="img-thumbnail registered-student-img" src="uploads/{{$students->student->image}}">
                                    <span>{{$students->student->name}}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>