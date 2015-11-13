@extends('layout.master')

@section('content')
    <div class="container">


        <div class="panel panel-default">

            <div class="panel-body">

                @include('partials.errors')
                @include('partials.success')

                @if(!empty($user))
                    {{ $user->username }}
                    {{ $user->email }}
                    {{ $user->created_at->diffForHumans() }}
                @endif

            </div>

        </div>

    </div>
@stop