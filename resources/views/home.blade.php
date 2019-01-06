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
                            <p> Using this platform, you can manage different things at JB! As an owner, you can manage
                                the different administrators, as well as the
                                course list, and student enrollment and registration.</p>
                            <p>Click on the "Schools" tab in order to manage students as courses. Click on the
                                "administrators" tab in order to manage the administrators at the school.</p>


                        @elseif(\Auth::user()->role ==2)
                            <p> As a manager, you can manage the different administrators at JB, as well as the
                                course list, and student enrollment and registration.</p>

                            <p>Click on the "Schools" tab in order to manage students as courses. Click on the
                                "administrators" tab in order to manage the administrators at the school.</p>

                        @elseif(\Auth::user()->role ==3)
                            <p> As a sales manager, you can manage the different courses offered at JB, as well as
                                student
                                enrollment and registration.</p>

                            <p>To do so, click on the "Schools" tab.</p>

                        @else
                            <p style="font-size:1.5em;">Please log in!</p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
