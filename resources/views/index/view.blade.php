@extends('layout.master')

@section('content')
    <div class="container">

        @if(!empty($posts))
            <ol>
                @foreach($posts as $post)
                    <li>{{ $post->title }}</li>
                @endforeach
            </ol>
        @endif

    </div>
@stop