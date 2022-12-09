@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header')
    <h1>Editar categorias</h1>
@stop

@section('content')
@if (session('info')) {{-- esta variable viene de el controlador edit, se manda  con    return redirect()->route('admin.categories.edit', $category)->with('info', 'actualizado con exito'); --}}
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
    
@endif
<div class="card">
    <div class="card-body">
        {{-- form model es para recuperar la informacion del formulario (rellenar los inputs con lo que ya hay en la BD) --}}
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put', 'autocomplete' => 'off'])!!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Ingrese nombre de categoria']) !!}

                @error('name')
                <span class="text-danger">{{$message}}</span> {{-- esto viene de las validaciones que se hicieron en el controlador --}}
                    
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder' => 'Ingrese slug de categoria', 'readonly']) !!}
                @error('slug')
                <span class="text-danger">{{$message}}</span> {{-- esto viene de las validaciones que se hicieron en el controlador --}}
                    
                @enderror
            </div>
            {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div> 
</div>
@stop

@section('js')

    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    <script>
        //Funcion que hace desaparecer el div transcurridos 3000 milisegundos!
        $(document).ready(function() {
            setTimeout(function() {
                // Declaramos la capa mediante una clase para ocultarlo
                $("#midiv").fadeOut(1500);
            },3000);
        });
    </script>

@endsection