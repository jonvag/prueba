<div class="card">{{-- este div siempre debe estar en un componente de livewire --}}
<div class="card-header">
    <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre del post">
</div>
    @if ($posts->count())
        <div class="card-body">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td with="10px"><a  class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}"> Editar</a></td>
                        <td with="10px">
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>

            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}{{--  para que se vea con los estilos de bootstrap hayq que hacer lo que esta el el controlador Posts-index --}}  
        </div>
    @else
        <div class="card-body">
            <strong>No hay resultados</strong>
        </div>
    @endif
        
</div>
