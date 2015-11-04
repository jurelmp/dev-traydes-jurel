<div>
    {{--nav tabs--}}
    <ul class="nav nav-tabs">
        <li role="presentation" class="active col-md-4"><a href="{{ url('user/my-posts?status=active') }}">Active</a></li>
        <li role="presentation" class="col-md-4"><a href="#">Expired</a></li>
        <li role="presentation" class="col-md-4"><a href="{{ url('user/my-posts?status=trashed') }}">Trashed</a></li>
    </ul>

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
                        {!! Form::open(array('url' => 'user/remove-post')) !!}
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button type="submit" title="Remove this post."><i class="fa fa-trash-o"></i></button>
                        {!! Form::close() !!}
                        {{--<a href="#" title="Delete this post."><i class="fa fa-trash-o"></i></a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif

    </table>
</div>