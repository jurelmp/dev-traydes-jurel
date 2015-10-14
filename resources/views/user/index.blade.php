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
                        <div class="panel-heading">TEST</div>
                        <div class="panel-body">
                            <h2>TEST</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop