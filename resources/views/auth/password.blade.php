@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Request Password Reset</div>
                    <div class="panel-body">

                        @include('auth.partials.errors')
                        @include('auth.partials.success')

                        {!! Form::open(array('url' => '/password/email', 'class' => 'form-horizontal', 'role' => 'form')) !!}
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                {!! Form::text('email', null, array('placeholder' => 'E-Mail Address', 'class' => 'form-control', 'autofocus')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Send Reset Link', array('class' => 'btn btn-success')) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    {{--<div class="panel-footer"></div>--}}
                </div>


            </div>
        </div>
    </div>
@stop