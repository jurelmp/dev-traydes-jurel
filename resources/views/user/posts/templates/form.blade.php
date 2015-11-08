<legend>Create new post</legend>

@include('partials.errors')
@include('partials.success')

{!! Form::open(array('url' => 'user/save-post', 'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true')) !!}

    {!! Form::hidden('cat_id', $category_id) !!}

    {!! Form::file('images[]', array('multiple' => true)) !!}
    <hr>

    <div class="form-group">
        <label class="col-md-4 control-label">Title</label>
        <div class="col-md-6">
            {!! Form::text('title', null, array('placeholder' => 'Title', 'class' => 'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Content</label>
        <div class="col-md-6">
            {!! Form::textarea('content', null,array('placeholder' => 'Content', 'class' => 'form-control', 'rows' => 10)) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('<span class="fa fa-check-square-o"></span> Submit', array('type' => 'submit', 'class' => 'btn btn-success')) !!}
        </div>
    </div>


{!! Form::close() !!}