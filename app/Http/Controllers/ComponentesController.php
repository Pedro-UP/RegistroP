<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComponentesPC;

class ComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentes = ComponentesPC::all();
        return view('componente.indexpc')->with('componentes', $componentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('componente.createpc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipocomponente' => 'required', 'descripcion' => 'required', 'cantidad' => 'required', 'precio' => 'required', 'imagen' => 'required|image|mimes:jpg,png,svg,ico|max:40024'
        ]);

        $componentes = $request->all();

        if($request->hasFile('imagen')){
            $componentes['imagen']=$request->file('imagen')->store('imagen','public');
        }

        ComponentesPC::create($componentes);

        return redirect('/componentepcs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productoPC=ComponentesPC::where('id', $id)->first();
            return view('detalles3', compact('productoPC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $componente = ComponentesPC::find($id);
        return view('componente.editpc')->with('componente', $componente);
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
        $componente = ComponentesPC::find($id);
        $componente->tipocomponente = $request->get('tipocomponente');
        $componente->descripcion = $request->get('descripcion');
        $componente->cantidad = $request->get('cantidad');
        $componente->precio = $request->get('precio');

        $componente->save();

        return redirect('/componentepcs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $componente = ComponentesPC::find($id);
        $componente->delete();
        return redirect('/componentepcs');
    }
}
