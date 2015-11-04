<div>
    {{--nav tabs--}}
    <ul class="nav nav-tabs">
        <li role="presentation" class="col-md-4"><a href="{{ url('user/my-posts?status=active') }}">Active</a></li>
        <li role="presentation" class="col-md-4"><a href="#">Expired</a></li>
        <li role="presentation" class="active col-md-4"><a href="{{ url('user/my-posts?status=trashed') }}">Trashed</a></li>
    </ul>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Deleted</th>
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
                        {{ $post->title }}
                    </td>
                    <td>{{ $post->deleted_at->format('M j, Y') }}</td>
                    {{--<td>{{ $post->category->name }}</td>--}}
                    <td>
                        {!! Form::open(array('url' => 'user/restore-post')) !!}
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button type="submit" title="Restore this post."><i class="fa fa-reply"></i></button>
                        {!! Form::close() !!}
                        {{--<a href="#" title="Restore this post"></a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif

    </table>

</div>