

<div class="form-group">
    <label class="col-md-4 control-label">Name</label>
    <div class="col-md-6">
        {!! Form::text('name', null, array('placeholder' => 'Category Name', 'class' => 'form-control', 'autofocus')) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Description</label>
    <div class="col-md-6">
        {!! Form::textarea('description', null, array('placeholder' => 'Category Description', 'class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::button('<span class="fa fa-check-square-o"></span> Submit', array('type' => 'submit', 'class' => 'btn btn-success')) !!}
    </div>
</div>

