<div class="panel panel-default">
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li role="presentation" class="@if(Request::is('admin/categories')) active @endif"><a href="{{ url('admin/categories') }}">Categories</a></li>
            <li role="presentation" class="@if(Request::is('admin/users')) active @endif"><a href="{{ url('admin/users') }}">Users</a></li>
            <li role="presentation" class="@if(Request::is('admin/posts')) active @endif"><a href="#">Posts</a></li>
        </ul>
    </div>
</div>