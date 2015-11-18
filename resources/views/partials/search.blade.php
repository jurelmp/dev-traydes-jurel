
{!! Form::open(array('url' => 't/search', 'method' => 'GET')) !!}

    <div class="form-group">
        {!! Form::text('t', old('t'), array('placeholder' => 'Search', 'class' => 'form-control')) !!}
    </div>

{!! Form::close() !!}
