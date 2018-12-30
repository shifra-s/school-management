@extends('layouts.app')
@section('content')

    <div class="col-md-12">

        <!-- List all admins -->
        <div class="col-md-3">
            <h4>Administrators <i class="fa fa-plus" id="add-admin"></i></h4>
            @if(count($administrators))
                <table class="table">
                    <thead>
                    <!--
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    -->
                    <tbody>
                    @foreach($administrators as $administrator)
                        <tr class="admin" data-id="{{$administrator->id}}" id="admin-{{$administrator->id}}">
                            <td><img width="100" height="100" class="img-thumbnail"
                                     src="uploads/{{$administrator->image}}"></td>
                            <td>{{$administrator->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <strong>No administrators found</strong>
            @endif
        </div>


        <div class="col-md-9">

            <!-- Show the number of admins -->
            <div id="main-info-wrapper-admins">
                <div class="panel panel-default" id="admin-count">
                    <div class="panel-heading">
                        <h4>Administrator Details</h4>
                    </div>
                    <div class="panel-body">
                        @if ($count == 0)
                            <?php echo 'There are no administrators at the school!'; ?>
                        @elseif ($count == 1)
                            <?php echo 'There is 1 administrator at the school!'; ?>
                        @else
                            <?php echo 'There are ' . $count . ' administrators at the school!' ?>
                        @endif
                    </div>
                </div>
                @include('administrators.add-admin')
                <div id="admin-details-section" style="display: none"></div>
            </div>

        </div>
        @endsection

    @push('scripts')

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="/scripts/add-admin.js"></script>
            <script src="/scripts/show-admin.js"></script>
            <script src='/scripts/delete-admin.js'></script>



    @endpush


