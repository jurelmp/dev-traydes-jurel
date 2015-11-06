@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">

                    @include($template)

                </div>
            </div>
        </div>
    </div>
@stop