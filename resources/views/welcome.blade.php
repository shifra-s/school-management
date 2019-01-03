@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ \Auth::check() ? 'Welcome, ' . \Auth::user()->name . '!': 'Please log in!'}}
                    </div>
                    <div class="panel-body">
                        {{--{{ \Auth::check() ? 'Using this platform, you can manage courses and student registration.' : ''}}--}}

                        @if(\Auth::check()==1)
                        <p> Using this platform, you can manage different things at JB! As an owner, you can manage the different administrators, as well as the
                            course list, and student enrollment and registration.</p>
                        <p>Click on the "Schools" tab in order to manage students as courses. Click on the "administrators" tab in order to manage the administrators at the school.</p>


                        @elseif(\Auth::check()==2)
                        <p> As a manager, you can manage the different administrators at JB, as well as the
                            course list, and student enrollment and registration.</p>

                        <p>Click on the "Schools" tab in order to manage students as courses. Click on the "administrators" tab in order to manage the administrators at the school.</p>



                        @elseif(\Auth::check()==3)
                        <p> As a sales manager, you can manage the different courses offered at JB, as well as student
                            enrollment and registration.</p>

                        <p>To do so, click on the "Schools" tab.</p>

                        @else
                        <p></p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
