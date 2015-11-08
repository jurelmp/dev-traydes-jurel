
{!! Form::open(array('url' => 't/search', 'method' => 'GET')) !!}
    {!! Form::text('t', old('t'), array('placeholder' => 'Search', 'class' => 'form-control')) !!}
{!! Form::close() !!}
