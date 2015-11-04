@extends('layout.master')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                @include('index.partials._sidebar')
            </div>

            <div class="col-md-9">


                @if(count($posts) > 0)

                    @foreach($posts as $post)
                        {{--<li>{{ $post->title }} - {{ $post->published_at->diffForHumans() }}</li>--}}

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="{{ url('t/post/'.$post->slug) }}">{{ $post->title }}</a>
                                [ {{ $post->user->username }} ]
                            </div>

                            <div class="panel-body">

                                <p>
                                    {{ str_limit($post->content, config('traydes.string_limit')) }}
                                </p>


                            </div>

                            <div class="panel-footer">
                                <a href="{{ url('t/view/'.$post->category->id) }}">{{ $post->category->name }}</a> &raquo;
                                {{ $post->published_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach


                    {!! $posts->render() !!}

                @else

                    <h4>Your search [ {{ $value }} ] did not match any posts.</h4>

                @endif


            </div>
        </div>

    </div>
@stop