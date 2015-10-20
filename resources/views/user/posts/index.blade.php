@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">

                <legend>Filter Categories</legend>
                @if(!empty($categories))
                    <div class="list-group">
                        @if(!empty($parent))
                            @foreach($parent as $p)
                                <a href="{{ route('categories.posts.index', [$p->id]) }}" class="list-group-item">{{ $p->name }}</a>
                            @endforeach
                        @endif

                        @if(!empty($current))
                            <a href="{{ route('categories.posts.index', [$current['id']]) }}" class="list-group-item active">{{ $current['name'] }}</a>
                        @endif

                        @foreach($categories as $category)
                            <a href="{{ route('categories.posts.index', [$category->id]) }}" class="list-group-item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                @endif

            </div>
            <div class="col-md-9">

                @if(!empty($posts))
                    <ul>
                        <legend>Posts</legend>
                        @foreach($posts as $post)
                            <li><a href="{{ route('categories.posts.show', [$post->category_id, $post->id]) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                @endif

            </div>

        </div>
    </div>
@stop