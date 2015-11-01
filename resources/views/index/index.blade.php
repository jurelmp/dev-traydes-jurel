@extends('layout.master')

@section('content')
    <div class="container">
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
    </div>
@stop