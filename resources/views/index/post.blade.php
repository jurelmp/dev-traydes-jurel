@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @if(!empty($post))

                @include('index.partials._modal')

                <div class="col-md-9">

                    <div class="well">
                        @include('partials.success')

                        <h2>{{ $post->title }}</h2>
                        <hr>

                        @if(count($post->images->toArray()) > 0)
                            <div class="row">
                                @foreach($post->images as $image)

                                    <div class="col-md-1">
                                        <a href="#" title="TEST">
                                            <img src="{{ $image->image_path }}" alt="" class="img-responsive img-thumbnail">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        @endif


                        <p>
                            {!! nl2br(e($post->content)) !!}
                        </p>

                    </div>

                </div>
                <div class="col-md-3">

                    <table class="table">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>By</td>
                            <td>{{ $post->user->username }}</td>
                        </tr>
                        <tr>
                            <td>Posted</td>
                            <td>{!! $post->published_at->diffForHumans() !!} [{{ $post->published_at->format('M j, Y') }}]</td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{!! link_to('t/view/'.$post->category->id, $post->category->name) !!}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            @else
                <div class="well">
                    <legend>Post not found.</legend>
                </div>
            @endif

        </div>
    </div>
@stop