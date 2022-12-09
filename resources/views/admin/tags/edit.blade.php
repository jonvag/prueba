@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header')
    <h1>Editar etiquetas</h1>
@stop

@section('content')
    <div class="container mx-auto">

        @if (session('info')) {{-- esta variable viene de el controlador edit, se manda  con    return redirect()->route('admin.categories.edit', $category)->with('info', 'actualizado con exito'); --}}
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
            
        @endif
        <div class="card">
            <div class="card-body">
                {{-- form model es para recuperar la informacion del formulario (rellenar los inputs con lo que ya hay en la BD) --}}
                {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put', 'autocomplete' => 'off'])!!}
                    {{-- la ruta del include se toma desde la carpeta view --}}
                @include('admin.tags.partials.form')    {{-- include es una directiva de blade, esto es por si el formulario cambia se hace para el de actualizar tambien --}}
 
                    {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}
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