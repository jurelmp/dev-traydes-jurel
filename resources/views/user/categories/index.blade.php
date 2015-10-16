@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <ul class="list-group">
                        <a href="{{ route('categories.show', [$category->id]) }}" class="list-group-item active"><strong>{{ $category->name }}</strong></a>
                        @if($category->subCategories->count())

                            @foreach($category->subCategories as $sub)
                                <a href="{{ route('categories.show', [$sub->id]) }}" class="list-group-item">{{ $sub->name }}</a>
                            @endforeach

                        @endif
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@stop