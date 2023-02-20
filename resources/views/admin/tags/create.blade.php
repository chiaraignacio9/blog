@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Crear un Tag</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Tag...']) !!}
                </div>
                @error('name')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror

                <div class="form-group">
                    {!! Form::label('slug', 'Slug', ) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Tag...', 'readonly']) !!}
                </div>

                @error('slug')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror

                <div class="form-group">
                    <label for="color" class="form-label">Color del Tag</label>
                    <input class="form-control-color" type="color" name="color" id="color">
                </div>

                @error('color')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror

                {!! Form::submit('Crear Tag', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor\jQuery-Plugin-stringToSlug-1.3\jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
