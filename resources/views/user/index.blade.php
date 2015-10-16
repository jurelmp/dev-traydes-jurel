@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">

            {{--@foreach($categories as $category)--}}
                {{--<div class="col-md-4">--}}
                    {{--<ul class="list-group">--}}
                        {{--<a href="#" class="list-group-item active"><strong>{{ $category->name }}</strong></a>--}}
                        {{--@if($category->subCategories->count())--}}

                                {{--@foreach($category->subCategories as $sub)--}}
                                    {{--<a href="#" class="list-group-item">{{ $sub->name }}</a>--}}
                                {{--@endforeach--}}

                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endforeach--}}






            {{--<div class="col-md-3">--}}
                {{--users navigation--}}

                {{--@include('user.partials._nav')--}}
            {{--</div>--}}
            {{--<div class="col-md-9">--}}

                {{--<div class="row">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">TEST</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<h2>TEST</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        </div>
    </div>
@stop