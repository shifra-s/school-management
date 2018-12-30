<div class="panel panel-default" id="edit-admin-form">
    <div class="panel-heading">
        <h4>Edit Admin </h4>
    </div>
    <div class="panel-body">
        <form action="/save-edited-admin" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="admin-name">Name</label>
                <input type="text" class="form-control" id="edit-admin-name" name="name" value="{{$admin->name}}"
                       placeholder="Enter Name">
                <input type="hidden" id="admin-id" name="id" value="{{$admin->id}}">
            </div>
            @if(\Auth::user()->role == 2 && \Auth::user()->id != $admin->id) <!--manager not editing himself -->
            <div class="form-group">
                <label for="admin-role">Role</label>
                <select name="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" {{$admin->role == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            @elseif(\Auth::user()->role == 1)
                <div class="form-group">
                    <label for="admin-role">Role</label>
                    <select name="role" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" {{$admin->role == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <label for="admin-role">Role</label>
                <input type="text" class="form-control" name="role" value="{{$admin->roles->name}}" disabled>
            @endif
            <div class="form-group">
                <label for="admin-description">Email</label>
                <input class="form-control" id="edit-admin-email" name="email" value="{{$admin->email}}">
            </div>
            <div class="form-group">
                <label for="admin-password">Password</label>
                <input type="password" class="form-control" id="edit-admin-password" name="password"
                       placeholder="Enter a password only if you want to change it">
            </div>
            <div class="form-group">
                <label for="admin-img">Photo</label>
                <input type="file" id="edit-admin-img" name="image">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Update">
            @if((\Auth::user()->role == 2 && \Auth::user()->id != $admin->id) || (\Auth::user()->role == 1))<!--manager not editing himself -->
                <button type="button" class="btn btn-danger" id="delete-admin-btn"
                        data-info="{{ json_encode(['id' => $admin->id, 'name' => $admin->name]) }}">Delete
                </button>
                @endif
            </div>
        </form>
    </div>
</div>