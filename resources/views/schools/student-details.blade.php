<!-- doesnt need to be in index bc it's retrieve data from db -->
<div class="panel panel-default" id="student-details">


    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6 col-xs-9">
                <h4>Student Details</h4>
            </div>
            <div class="col-md-6 col-xs-9">
                <button class="btn btn-info pull-right student-edit" data-id="{{$student->id}}">Edit</button>
            </div>
        </div>
    </div>
    <div class="panel-body student-details-body">
        <div class="col-md-12 col-xs-9">
            <div class="col-md-3 col-xs-9">
                <img class="img-thumbnail student-image" src="uploads/{{$student->image}}">
            </div>
            <div class="col-md-9 col-xs-9">
                <span class="student-name"> {{$student->name}}</span>
            </div>
            <div class="col-md-9 col-xs-9">
                <span class="student-number"> {{$student->phone}}</span>
            </div>
            <div class="col-md-9 col-xs-9">
                <span class="student-email"> {{$student->email}} </span>
            </div>
            <div class="col-md-12 col-xs-9">
                @if($student->courses)
                    @foreach($student->courses as $courses)
                        <div class="row" id="courses">

                        @if(isset($courses->course) && !is_null($courses->course)) <!--check to make sure the course list isn't empty-->
                            <div class="col-md-6 col-xs-9">

                                <img class="img-thumbnail registered-course-img" src="uploads/{{$courses->course->image}}">
                                <span>{{$courses->course->name}}</span>
                            </div>
                            @endif
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
