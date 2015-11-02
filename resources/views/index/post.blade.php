@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @if(!empty($post))

                <div class="col-md-9">

                    <div class="well">
                        <div class="row">
                            <h2>{{ $post->title }}</h2>
                            <hr>

                            @if(!empty($post->images()))
                                @foreach($post->images as $image)
                                    <img src="{{ $image->image_path }}" alt="" class="img-thumbnail" width="70" height="70">
                                @endforeach
                            @endif

                            <hr>
                            <p>
                                {!! nl2br(e($post->content)) !!}
                            </p>
                        </div>
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

            @endif

        </div>
    </div>
@stop