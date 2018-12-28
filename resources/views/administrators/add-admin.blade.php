<div class="panel panel-default" id="add-admin-form" style="display: none">
    <div class="panel-heading">
        <h4>Add New Administrator </h4>    
    </div>
    <div class="panel-body">
        <form action="/add-new-admin" method="POST" enctype="multipart/form-data" id="admin-validation">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="admin-name">Name</label>
                <input type="text" class="form-control" id="admin-name" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="admin-role">Role</label>
                <input type="text" class="form-control" id="admin-role" name="role" placeholder="Enter Role">
            </div>
            <div class="form-group">
                <label for="admin-email">Phone Number</label>
                <input type="text" class="form-control" id="admin-number" name="phone" placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
                <label for="admin-email">Email Address</label>
                <input type="text" class="form-control" id="admin-email" name="email" placeholder="Enter Email Address">
            </div>
            <div class="form-group">
                <label for="admin-pwd">Password</label>
                <input type="text" class="form-control" id="admin-pwd" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="admin-img">Photo</label>
                <input type="file" name="image" id="admin-img">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Add New Administrator">
            </div>
        </form>
    </div>
</div>