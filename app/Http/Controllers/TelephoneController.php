<?php

namespace App\Http\Controllers;

use App\Models\Telephone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['telephones'] = Telephone::paginate(10);

        //Por aqui tengo que pasarle mi id para asi poder hacer que salgan o no los botones de editar y borrar, pero no se hacerlo

        return view('telephone.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('telephone.create');
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
            'telephone' => 'required|int|min:100000000|max:999999999',
            'description' => 'required|string|max:100',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
            'min' => 'El campo :attribute no puede tener menos de :min caracteres.',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosTelephone = $request->except('_token');

        $datosTelephone['user_id'] = Auth::id();

        Telephone::insert($datosTelephone);

        return redirect('telephone')->with('mensaje', 'El telefono se ha registrado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telephone = Telephone::findOrFail($id);
        return view('telephone.edit', compact('telephone'));

        //Algo asi seria para saber si es tu telefono o no
        
        // $telephone = Telephone::findOrFail($id);
        // if(Auth::id() == $telephone['user_id']){
        //     return view('telephone.edit', compact('telephone'));
        // } else {
        //     return view('telephone')->with('mensaje', 'No es tu telefono');
        // }
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
            'telephone' => 'required|int|min:100000000|max:999999999',
            'description' => 'required|string|max:100',
        ];

        $mensaje = [
            'required' => 'El :attribute es obligatorio.',
            'max' => 'El campo :attribute no puede tener mas de :max caracteres.',
            'min' => 'El campo :attribute no puede tener menos de :min caracteres.',
        ];

        $this->validate($request, $campos, $mensaje);

        // $datos['telephones'] = Telephone::paginate(100000);

        // dd($datos);

        $datosTelephone = $request->except('_token', '_method');

        $user_id = DB::select('SELECT * FROM telephones WHERE id = ?', [$id]);

        if($user_id[0]->user_id == Auth::id()){
            Telephone::where('id', '=', $id)->update($datosTelephone);
            return redirect('telephone')->with('mensaje', 'El telefono se ha actualizado correctamente');
        } else {
            return redirect('telephone')->with('mensaje', 'Este telefono no es tuyo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $telephone = Telephone::findOrFail($id);

        $user_id = DB::select('SELECT * FROM telephones WHERE id = ?', [$id]);

        if($user_id[0]->user_id == Auth::id() && $telephone){
            Telephone::destroy($id);
            return redirect('/telephone')->with('mensaje', 'Se ha eliminado el telefono ' . $id . ' correctamente.');
        } else {
            return redirect('/telephone')->with('mensaje', 'Este telefono no es tuyo');
        }
    }
}
