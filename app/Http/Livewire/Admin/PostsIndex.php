<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; /* esto es para que la paginacion se vea con los estilos de bootstrap ya que por defecto se cargan los de taildwind */

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        /* search nos permite sincronizar el imput con esta variable y a medida que cambie se busca en la BD */
        $posts= Post::where('user_id', auth()->user()->id)
        ->where('name', 'LIKE', '%' . $this->search . '%')  
        ->latest('id')->paginate(10);/* usuario actualmente autentificado */
        
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
