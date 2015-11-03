@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                {{--users navigation--}}

                @include('user.partials._nav')
            </div>

            <div class="col-md-9">

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <legend>My Posts</legend>

                            <div>
                                {{--nav tabs--}}
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active col-md-4"><a href="#">Active</a></li>
                                    <li role="presentation" class="col-md-4"><a href="#">Expired</a></li>
                                    <li role="presentation" class="col-md-4"><a href="#">Trashed</a></li>
                                </ul>


                                {{--tab panes--}}
                                {{--<div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="active">

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="expired">

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="trashed">

                                    </div>
                                </div>--}}

                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Posted</th>
                                        {{--<th>Category</th>--}}
                                        <th data-sortable="false">Action</th>
                                    </tr>
                                    </thead>

                                    @if(!empty($posts))
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    <a href="{{ url('t/post/'.$post->slug) }}">{{ $post->title }}</a>
                                                </td>
                                                <td>{{ $post->published_at->format('M j, Y') }}</td>
                                                {{--<td>{{ $post->category->name }}</td>--}}
                                                <td>
                                                    <a href="#"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @endif

                                </table>


                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('.table').DataTable();
    </script>
@stop