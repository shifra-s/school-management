<!-- doesnt need to be in index bc it's retrieve data from db -->
<div class="panel panel-default" id="student-details">
    @foreach($student as $studentRelation)
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6 col-xs-9">
                <h4>Student Details</h4>
            </div>
            <div class="col-md-6 col-xs-9">
                <button class="btn btn-info pull-right student-edit" data-id="{{$studentRelation->id}}">Edit</button>
            </div>
        </div>
    </div>
    <div class="panel-body student-details-body">
        <div class="col-md-12 col-xs-9">
            <div class="col-md-3 col-xs-9">
                <img class="img-thumbnail student-image" src="uploads/{{$studentRelation->image}}">
            </div>
            <div class="col-md-9 col-xs-9">
                <strong class="student-name">Name</strong>: {{$studentRelation->name}}
            </div>
            <div class="col-md-9 col-xs-9">
                <strong class="student-number">Number</strong> {{$studentRelation->phone}}
            </div>
            <div class="col-md-9 col-xs-9">
                <strong class="student-email">Email</strong> {{$studentRelation->email}}
            </div>
        </div>
        <div class="col-md-12 col-xs-9">

            @foreach($studentRelation->courses as $courses)
                <div class="row" id="courses">

                    @if(isset($courses->course) && !is_null($courses->course)) <!--check to make sure the course list isn't empty-->
                        <div class="col-md-3 col-xs-9">

                            <img class="img-thumbnail registered-course-img" src="uploads/{{$courses->course->image}}">
                            <span>{{$courses->course->name}}</span>
                        </div>
                    @endif
                </div>

            @endforeach

        </div>

    </div>
        @endforeach
</div>
