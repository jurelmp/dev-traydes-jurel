@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{--users navigation--}}

                @include('user.partials._nav')

            </div>
            <div class="col-md-9">

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <legend>Account</legend>
                            @include('partials.errors')
                            @include('partials.success')

                            {!! Form::open(array('url' => '/user/account-settings', 'class' => 'form-horizontal', 'role' => 'form')) !!}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">User Name</label>
                                    <div class="col-md-6">
                                        {!! Form::text('username', $user->username, array('placeholder' => 'User Name', 'class' => 'form-control', 'disabled')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        {!! Form::text('email', $user->email, array('placeholder' => 'E-Mail Address', 'class' => 'form-control', 'disabled')) !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Current Password</label>
                                    <div class="col-md-6">
                                        {!! Form::password('old_password', array('placeholder' => 'Current Password', 'class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">New Password</label>
                                    <div class="col-md-6">
                                        {!! Form::password('new_password', array('placeholder' => 'New Password', 'class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">New Password Confirmation</label>
                                    <div class="col-md-6">
                                        {!! Form::password('new_password_confirmation', array('placeholder' => 'New Password Confirmation', 'class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {!! Form::submit('Save Changes', array('class' => 'btn btn-success')) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop