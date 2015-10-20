@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">

            @if(!empty($categories))

                    @foreach($categories as $category)
                        <div class="list-group">
                            <a href="{{ route('categories.posts.index', [$category->id])  }}" class="list-group-item active">{{ $category->name }}</a>
                            @if(!empty($category->subCategories()))

                                @foreach($category->subCategories as $sub)
                                    <a href="{{ route('categories.posts.index', [$sub->id]) }}" class="list-group-item">{{ $sub->name }}</a>
                                @endforeach

                            @endif
                        </div>
                    @endforeach

            @endif

        </div>
    </div>
@stop