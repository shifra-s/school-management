<!--form to add a new course -->
<div class="panel panel-default" id="add-course-form" style="display: none">
    <div class="panel-heading">
        <h4>Add New Course </h4>
    </div>
    <div class="panel-body">    
        <form action="/add-new-course" method="POST" enctype="multipart/form-data" id="course-validation" onsubmit="return courseFormValidation()">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="course-name">Course Name</label>
                <input type="text" class="form-control" id="course-name" name="name" maxlength="30" placeholder="Enter Course Name">
                <div id="course-error-name"></div>
            </div>
            <div class="form-group">
                <label for="course-description">Course Description</label>
                <textarea class="form-control" id="course-description" rows="4" name="description" maxlength="500" placeholder="Enter Course Description"></textarea>
                <div id="course-error-description"></div>
            </div>
            <div class="form-group">
                    <label for="course-img">Photo</label>
                    <input type="file" name="image" id="course-img">
                    <div id="course-error-image"></div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Add New Course">
            </div>
        </form>
    </div>
</div>

