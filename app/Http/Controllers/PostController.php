<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller 
{
    public function index(){
        /* $posts =  DB::table('posts')
        ->join('images', 'posts.id', '=', 'images.imageable_id')
        ->select('posts.id', 'posts.name', 'posts.slug', 'posts.extract', 'posts.body', 'posts.status', 'posts.user_id', 'posts.category_id', 'images.url')
        ->where('posts.status', '=', 2)
        ->orderByDesc('pagos.created_at')
        ->simplePaginate(8) ;
        ->get(); */

        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        $categories = Category::get()->take(3);
        $tags = Tag::get()->take(3);

/* return $tags; */
        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    public function show (Post $post){
        /* return $post; */
        /* $posts = Post::where('id', $post)->get(); */

        $similares = Post::where('category_id', $post->category_id )
                                ->where('status', 2)
                                ->where('id', '!=', $post->id )
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('posts.show', compact('post', 'similares'));
    }

    public function carlo ($dato){
        return $dato;
        /* $posts = Post::where('id', $post)->get(); */

        /* $similares = Post::where('category_id', $post->category_id )
                                ->where('status', 2)
                                ->where('id', '!=', $post->id )
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('posts.show', compact('post', 'similares')); */
    }

    public function category (Category $category){
        /* $posts = Post::where('id', $post)->get(); */

        $posts = Post::where('category_id', $category->id )
                                ->where('status', 2)
                                ->latest('id')
                                ->paginate(6);

                                /* return $posts; */

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag (Tag $tag){
        /* $posts = Post::where('id', $post)->get(); */

        $posts= $tag->posts()->where('status', 2)->latest('id')->paginate(4); /* esto es una consulta a una relacion (tabla posts y tags) con una condicion */

        return view('posts.tag', compact('posts', 'tag'));
    }

}
