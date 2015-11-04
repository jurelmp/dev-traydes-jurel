@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{--users navigation--}}

                @include('user.partials._nav')
            </div>

            <div class="col-md-9">


                    <div class="panel panel-default">
                        <div class="panel-body">
                            <legend>My Posts</legend>

                            @include('partials.success')

                            @if(!empty($template))
                                @include($template)
                            @endif

                        </div>
                    </div>


            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('.table').DataTable();
    </script>
@stop