<div class="panel panel-default" id="add-student-form" style="display: none">
    <div class="panel-heading">
        <h4>Add New Student </h4>
    </div>
    <div class="panel-body">
        <form action="/add-new-student" method="POST" enctype="multipart/form-data" id="student-validation">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="student-name">Name</label>
                <input type="text" class="form-control" id="student-name" maxlength="30" name="name"
                       placeholder="Enter Name">
                <div id="student-error-name"></div>
            </div>
            <div class="form-group">
                <label for="student-number">Phone Number</label>
                <input type="text" class="form-control" id="student-number" maxlength="15" name="phone"
                       placeholder="Enter Phone Number">
                <div id="student-error-number"></div>
            </div>
            <div class="form-group">
                <label for="student-email">Email</label>
                <input type="text" class="form-control" id="student-email" maxlength="50" name="email"
                       placeholder="Enter Email">
                <div id="student-error-email"></div>
            </div>
            <div class="form-group">
                <label for="student-img">Photo</label>
                <input type="file" id="student-img" name="image" required>
                <div id="student-error-image"></div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Add New Student">
            </div>
        </form>
    </div>
</div>
