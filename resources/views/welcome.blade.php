@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ \Auth::check() ? 'Welcome, ' . \Auth::user()->name . '!': 'Welcome to JB Management: A Platform for Managing Students, Administrators, and Courses'}}
                    </div>
                    <div class="panel-body">
                        @if(\Auth::user()->role ==1)
                            <p> As an owner, you can use this platform to manage
                                the administrators, the
                                course list, and student enrollment and registration at JB.</p>
                            <p>Click on the "Schools" tab in order to view and manage students and courses. Click on the
                                "administrators" tab in order to view and manage the administrators at the school.</p>


                        @elseif(\Auth::user()->role ==2)
                            <p> As a manager, you can manage the different administrators at JB, the
                                course list, and student enrollment and registration.</p>

                            <p>Click on the "Schools" tab in order to manage students and courses. Click on the
                                "administrators" tab in order to manage the administrators at the school.</p>

                        @elseif(\Auth::user()->role ==3)
                            <p> As a sales manager, you can manage the different courses offered at JB, as well as
                                student enrollment and registration.</p>

                            <p>To do so, click on the "Schools" tab.</p>

                        @else
                            <p style="font-size:1.5em;">Please log in to begin using the platform!</p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
