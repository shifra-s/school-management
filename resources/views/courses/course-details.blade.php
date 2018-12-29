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
                <span class="course-number">{{$course->description}}</span>
            </div>
            <ul id="students">
            </ul>
        </div>

    </div>
</div>
    