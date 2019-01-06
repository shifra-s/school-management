<div class="panel panel-default" id="add-admin-form" style="display: none">
    <div class="panel-heading">
        <h4>Add New Administrator </h4>    
    </div>
    <div class="panel-body">
        <form action="/add-new-admin" method="POST" enctype="multipart/form-data" id="admin-validation" onsubmit="return adminFormValidation()">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="admin-name">Name</label>
                <input type="text" class="form-control" id="admin-name" name="name" placeholder="Enter Name">
                <div id="admin-error-name"></div>
            </div>
            <div class="form-group">
                <label for="admin-role">Role</label>
                <select class="form-control" id="admin-role" name="role">
                    <option value=''>Select a role</option>
                    <option value="1">Owner</option>
                    <option value="2">Manager</option>
                    <option value="3">Sales</option>
                </select>
                <div id="admin-error-role"></div>
            </div>
            <div class="form-group">
                <label for="admin-number">Phone Number</label>
                <input type="number" class="form-control" id="admin-number" name="phone" placeholder="Enter Phone Number">
                <div id="admin-error-number"></div>
            </div>
            <div class="form-group">
                <label for="admin-email">Email Address</label>
                <input type="text" class="form-control" id="admin-email" name="email" placeholder="Enter Email Address">
                <div id="admin-error-email"></div>
            </div>
            <div class="form-group">
                <label for="admin-pwd">Password</label>
                <input type="password" class="form-control" id="admin-pwd" name="password" placeholder="Enter Password">
                <div id="admin-error-password"></div>
            </div>
            <div class="form-group">
                <label for="admin-img">Photo</label>
                <input type="file" name="image" id="admin-img">
                <div id="admin-error-image"></div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Add New Administrator">
            </div>
        </form>
    </div>
</div>