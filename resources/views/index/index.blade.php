@extends('layout.master')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @include('partials.errors')
                @include('partials.search')
            </div>
        </div>
        <br>

        {{--<div class="col-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="height: 100%;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-11">--}}

            @if(!empty($categories))
                <div class="row">

                    @foreach($categories as $category)
                        <div class="col-md-4">
                            <div class="well">
                                <legend><a href="{{ url('t/view/'.$category->id) }}">{{ $category->name }}</a></legend>

                                @if(!empty($category->subCategories()))

                                    @foreach($category->subCategories as $sub)
                                        <a href="{{ url('t/view/'.$sub->id) }}">{{ $sub->name }}</a> /
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

        {{--</div>--}}
    </div>
@stop