@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{--user navigation--}}

                @include('user.partials._nav')
            </div>
            <div class="col-md-9">
                <div class="row">

                    <div class="panel panel-default">
                        {{--<div class="panel-heading"></div>--}}
                        <div class="panel-body">
                            <legend>Profile</legend>

                            @include('partials.errors')
                            @include('partials.success')

                            {!! Form::open(array('url' => '/user/profile', 'class' => 'form-horizontal', 'role' => 'form')) !!}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Address</label>
                                    <div class="col-md-6">
                                        {!! Form::textarea('address', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Contact No</label>
                                    <div class="col-md-6">
                                        {!! Form::text('contact_no', null, array('class' => 'form-control', 'placeholder' => 'Contact No')) !!}
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