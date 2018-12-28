<!-- doesnt need to be in index bc it's retrieve data from db -->
<div class="panel panel-default" id="student-details">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <h4>Student Details</h4>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info pull-right student-edit" data-id="{{$student->id}}">Edit</button>
            </div>
        </div>
    </div>
    <div class="panel-body student-details-body">
        <div class="col-md-12">
            <div class="col-md-3">
                <img class="img-thumbnail student-image" src="uploads/{{$student->image}}">
            </div>
            <div class="col-md-9">
                <strong class="student-name">Name</strong>: {{$student->name}}
            </div>
            <div class="col-md-9">
                <strong class="student-number">Number</strong> {{$student->phone}}
            </div>
            <div class="col-md-9">
                <strong class="student-email">Email</strong> {{$student->email}}
            </div>
            <div>
                <ul id="courses">

                </ul>
            </div>
        </div>

    </div>
</div>
