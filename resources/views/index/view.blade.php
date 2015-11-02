@extends('layout.master')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item">Morbi leo risus</a>
                    <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item">Vestibulum at eros</a>
                </div>
            </div>

            <div class="col-md-9">


                @if(!empty($posts))

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

                @endif


            </div>
        </div>

    </div>
@stop