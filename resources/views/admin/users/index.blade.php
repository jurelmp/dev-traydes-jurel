@extends('layout.master')

@section('content')
    <div class="container">
        @include('admin.partials._nav')

        <div class="panel panel-default">
            {{--<div class="panel-heading"><i class="fa fa-users fa-3x"></i>&nbsp;</div>--}}
            <div class="panel-body">

                @include('partials.success')
                @include('partials.errors')


                <div class="row">
                    <div class="col-md-12">
                        <select name="" id="">
                            <option value="">All</option>
                            <option value="">Active</option>
                            <option value="">Deleted</option>
                        </select>

                        <a href="{{ url('admin/user?action=create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-user-plus"></i>
                            Add
                        </a>
                    </div>
                </div>


                <table id="table-users" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Date Registered</th>
                    </tr>
                    </thead>

                    @if(!empty($users))
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <a href="#">{{ $user->username }}</a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    @endif
                </table>


            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('#table-users').DataTable();
    </script>
@stop