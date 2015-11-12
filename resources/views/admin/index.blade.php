@extends('layout.master')

@section('content')
    <div class="container">
        @include('admin.partials._nav')

        <legend><h1>This is an Admin Dashboard</h1></legend>

        <div class="panel panel-default">
            <div class="panel-body">
                <i class="fa fa-paypal fa-4x"></i>
                <i class="fa fa-cc-jcb fa-4x"></i>
            </div>
        </div>

    </div>


@stop