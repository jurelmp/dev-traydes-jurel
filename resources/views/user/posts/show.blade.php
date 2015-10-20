@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">

            @if(!empty($post))
                <h2>{{ $post->title }}</h2>
                Posted: {{ $post->published_at->diffForHumans() }} = Posted By: {{ $post->user->email }}
                <hr>
                <p>{!! nl2br(e($post->content)) !!}</p>
            @endif

        </div>
    </div>
@stop