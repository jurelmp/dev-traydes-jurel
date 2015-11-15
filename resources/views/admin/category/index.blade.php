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

                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_category_form">
                            <i class="fa fa-plus"></i>
                            Add
                        </a>

                        @include('admin.partials._modal_category')
                    </div>
                </div>

                <h3>@if(empty($current)) All Categories @else {{ $current->name }} @endif</h3>

                <table id="table-categories" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sub Categories</th>
                        <th>Total Posts</th>
                        <th>Date Created</th>
                        <th data-sortable="false">Action</th>
                    </tr>
                    </thead>

                    @if(!empty($categories))
                        <tbody>
                        @foreach($categories as $category)

                            <tr id="{{ $category->id }}">
                                <td>
                                    <a href="{{ url('admin/categories?id=' . $category->id) }}">{{ $category->id }} - {{ $category->name }}</a>
                                </td>
                                <td>{{ $category->subCategories->count() }}</td>
                                <td>{{ $category->totalPosts() }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="#" id="{{ $category->id }}" title="Edit {{ $category->name }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    @endif

                </table>


                @include('admin.partials._modal_update_category')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('#table-categories').DataTable();

        var editModal = function() {
            $('#modal_category_update').modal('show');
        };

        $('#table-categories tr td:last-child a').click(function() {
            /*console.log(this.id);*/

            var id = this.id;
            var lnkpath = "api-category/" + id;

            editModal();

            $.ajax({
                method: 'GET',
                url: lnkpath,
                success: function(data) {
                    $('#modal_category_update input[name=category_id]').val(data.id);
                    $('#modal_category_update input[name=name]').val(data.name);
                    $('#modal_category_update textarea[name=description]').val(data.description);
                }
            });
        });

        $('#category_new').submit(function (e) {
            e.preventDefault();
            var parent_id = $('input[name=parent_id]').val();
            var name = $('input[name=name]').val();
            var description = $('textarea[name=description]').val();
            var _token = $('input[name=_token]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': _token,
                }
            });

            $.ajax({
               method: 'POST',
                url: '{{ url('admin/category-create') }}',
                data: {
                    'parent_id': parent_id,
                    'name': name,
                    'description': description,
                    '_token': _token,
                },
                error: function(jqXHR) {
                    /*console.log(jqXHR.responseJSON);*/
                    var str = "<div class='alert alert-danger'><strong>Whoops!</strong>There were some problems with your input. <br><ul></ul></div>";
                    var list = '';
                    var errors = jqXHR.responseJSON;
                    var name = errors.name;

                    for(var x in name) {
                        list += '<li>' + name[x] + '</li>';
                    }
                    $('#err').html(str).find('ul').html(list);
                },
                success: function(data) {
                    /*console.log(data);*/
                    if(data == 'success') {
                        $('#err').html('');
                        alert('Success: Category created.');
                        window.location.href = "{{ url('admin/categories') }}"
                    }
                }
            });
        });
    </script>
@stop
