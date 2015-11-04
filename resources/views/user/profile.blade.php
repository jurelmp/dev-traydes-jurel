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
                            <legend>Profile <span style="font-size: 11px">[Last Updated: {{ $profile->updated_at->diffForHumans() }}]</span></legend>

                            @include('partials.errors')
                            @include('partials.success')



                            {!! Form::open(array('url' => '/user/profile', 'class' => 'form-horizontal', 'role' => 'form')) !!}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-6">
                                        {!! Form::text('first_name', $profile->first_name, array('class' => 'form-control', 'placeholder' => 'First Name')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-6">
                                        {!! Form::text('last_name', $profile->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Address</label>
                                    <div class="col-md-6">
                                        {!! Form::textarea('address', $profile->address, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Address')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Contact No</label>
                                    <div class="col-md-6">
                                        {!! Form::text('contact_no', $profile->contact_no, array('class' => 'form-control', 'placeholder' => 'Contact No')) !!}
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