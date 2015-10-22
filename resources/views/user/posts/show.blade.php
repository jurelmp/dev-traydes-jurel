@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">

            @if(!empty($post))
                <h2>{{ $post->title }}</h2>
                Posted: {{ $post->published_at->diffForHumans() }} = Posted By: {{ $post->user->email }}
                <hr>
                @if(!empty($post->images()))
                    @foreach($post->images as $image )
                        <img src="{{ $image->image_path }}" alt="" height="50" width="50">
                    @endforeach
                @endif
                <hr>
                <p>{!! nl2br(e($post->content)) !!}</p>
            @endif

        </div>
    </div>
@stop