<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $colors=[
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'blue' => 'Azul',
            'green' => 'Verde',
            'gray' => 'Gris',
            'indigo' => 'Indigo',
            'purple' => 'Purpura',
            'pink' => 'Rosado'
        ];
        return view('admin.tags.create', compact('colors'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) /* aqui es donde creamos un nuevo tag */
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags', /* aqui se especifica que sea unico en la tabla categories */
            'color' => 'required'
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.index', $tag)->with('info', 'creado con exito');/* este with lo recibe la vista con la variable session info */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        return view('admin.tags.show', compact('tag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {
        $colors=[
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'blue' => 'Azul',
            'green' => 'Verde',
            'gray' => 'Gris',
            'indigo' => 'Indigo',
            'purple' => 'Purpura',
            'pink' => 'Rosado'
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id", /* aqui se especifica que sea unico en la tabla categories */
            'color' => 'required'
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizó con exito');
    }

    /**  
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se elimino correctamente');
    }
}
