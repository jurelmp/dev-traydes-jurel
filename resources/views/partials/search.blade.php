<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(array('url' => 't/search', 'method' => 'GET')) !!}
            {!! Form::text('t', null, array('placeholder' => 'Search', 'class' => 'form-control')) !!}
        {!! Form::close() !!}
    </div>
</div>
<br>