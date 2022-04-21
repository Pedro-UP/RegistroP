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
        $componentes = new ComponentesPC();
        $componentes->tipocomponente = $request->get('tipocomponente');
        $componentes->descripcion = $request->get('descripcion');
        $componentes->cantidad = $request->get('cantidad');
        $componentes->precio = $request->get('precio');

        $componentes->save();

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
        //
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
