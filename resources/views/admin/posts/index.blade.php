@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header') 
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}"> Nuevo Post</a>
    <h1>Listado de POST</h1>
@stop

@section('content')
    <div class="container mx-auto">
        {{-- el controlador de este componente esta en controler/livewire/admin/postindex  y la vista esta en views/livewire/admin/posts-index --}}
       @livewire('admin.posts-index')  {{-- Video aprende a crear un blog autoadministrable video como mis posts creados --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop