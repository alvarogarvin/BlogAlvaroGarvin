<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['post'] = Post::paginate(2);

        return view('post.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación del formulario de crear

        $campos = [
            'title' => 'required|string|max:75',
            'status' => 'required|string|max:75',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosPosts = $request;

        Post::insert($datosPosts);

        return redirect('post')->with('mensaje', 'El post ' . $datosPosts['id'] . ' se ha publicado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación del formulario de crear

        $campos = [
            'title' => 'required|string|max:75',
            'status' => 'required|string|max:75',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosPosts = $request;

        Post::where('id', '=', $id)->update($datosPosts);

        // $post = Post::findOrFail($id);  

        return redirect('post')->with('mensaje', 'El post ' . $datosPosts['id'] . ' se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if(Storage::delete('public/' . $post->foto)){
            Post::destroy($id);
        }

        return redirect('/post')->with('mensaje', 'Se ha eliminado el post ' . $id . ' (' . $post->nombre . ' ' . $post->apellido . ')' . ' correctamente.');
    }
}
