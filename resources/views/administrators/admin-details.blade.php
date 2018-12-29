<div class="panel panel-default" id="admin-details">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                <h4>Admin Details</h4>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info pull-right admin-edit" data-id="{{$admin->id}}">Edit</button>
            </div>
        </div>
    </div>
    <div class="panel-body admin-details-body">
        <div class="col-md-12">
            <div class="col-md-3">
                <img class="img-thumbnail admin-image" src="/uploads/{{$admin->image}}">
            </div>
            <div class="col-md-9">
                <h3 class="admin-name">{{$admin->name}}</h3>
            </div>
            <div class="col-md-9">
                <span class="admin-email">{{$admin->email}}</span>
            </div>
            <div class="col-md-9">
                <!--need this to say the name of the role - so from the roles table -->
                <span class="admin-role">{{$admin->role}}</span>
            </div>
        </div>

    </div>
</div>


