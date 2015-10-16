@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            {{--categories filters--}}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Categories Filter</b></div>

                    @if(!empty($cat) && !empty($sub_categories))
                        <div class="list-group">
                            @if($cat->id != 0)
                                <a href="{{ route('categories.show', [0]) }}" class="list-group-item">All Categories</a>
                            @endif

                            <a href="{{ route('categories.show', [$cat->id]) }}" class="list-group-item active">
                                @if($cat->id == 0)
                                    Everything
                                @else
                                    {{ $cat->name }}
                                @endif
                                <span class="badge">{{ $cat->posts->count() }}</span>
                            </a>
                            @foreach($sub_categories as $sub_category)
                                <a href="{{ route('categories.show', [$sub_category->id]) }}" class="list-group-item">
                                    {{ $sub_category->name }}
                                    <span class="badge">{{ $sub_category->posts->count() }}</span>
                                </a>
                            @endforeach
                        </div>
                    @else
                        No Categories Yet!
                    @endif

                </div>

            </div>
            <div class="col-md-9">

            </div>
        </div>
    </div>
@stop