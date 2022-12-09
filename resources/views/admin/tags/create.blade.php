@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header')
    <h1>Crear etiquetas</h1>
    
@stop

@section('content')
    <div class="container mx-auto">

       {{--  <x-alert /> --}}
       <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store', 'autocomplete' => 'off'])!!}
                {{-- la ruta del include se toma desde la carpeta view --}}
                @include('admin.tags.partials.form')    {{-- include es una directiva de blade, esto es por si el formulario cambia se hace para el de actualizar tambien --}}
                {!! Form::submit('crear etiqueta', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div> 
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
    /* $(document).ready(function() {
        setTimeout(function() {
            // Declaramos la capa mediante una clase para ocultarlo
            $("#midiv").fadeOut(1500);
        },3000);
    }); */
</script>

@endsection