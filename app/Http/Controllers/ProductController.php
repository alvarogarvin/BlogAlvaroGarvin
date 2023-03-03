<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['products'] = Product::paginate(10);

        return view('product.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name' => 'required|string|max:75',
            'description' => 'required|string|max:75',
            'quantity' => 'required|string|max:75',
            'description' => 'required|string|max:75',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProduct = $request->except('_token');

        // dd($datosProduct);

        $datosProduct['seller_id'] = Auth::id();

        Product::insert($datosProduct);

        return redirect('product')->with('mensaje', 'El producto se ha publicado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
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
        $campos = [
            'name' => 'required|string|max:75',
            'description' => 'required|string|max:75',
            'quantity' => 'required|string|max:75',
            'description' => 'required|string|max:75',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProduct = $request->except('_token', '_method');

        Product::where('id', '=', $id)->update($datosProduct);

        // $product = Product::findOrFail($id);

        return redirect('product')->with('mensaje', 'El producto se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if($product){
            Product::destroy($id);
            return redirect('/product')->with('mensaje', 'Se ha eliminado el producto ' . $id . ' correctamente.');
        } else {
            return redirect('/product')->with('mensaje', 'No se ha podido encontrar el post');
        }
    }
}
