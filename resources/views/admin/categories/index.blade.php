@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header')
    <h1>Lista de categorias</h1>
@stop

@section('content')
    @if (session('info')) {{-- esta variable viene de el controlador edit, se manda  con    return redirect()->route('admin.categories.edit', $category)->with('info', 'actualizado con exito'); --}}
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="{{-- container mx-auto --}}">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-secondary " href="{{route('admin.categories.create')}}"> Agregar categoria</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th> 
                            <th>Name</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td width="10px" > <a class= "btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category->id)}}">editar</a></td>
                                <td width="10px">
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm"> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       {{--  <x-alert /> --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop