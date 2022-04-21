<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celular;

class CelularControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celulares = Celular::all();
        return view('celular.indexC')->with('celulares', $celulares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('celular.createC');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $celulares = new Celular();
        $celulares->marca = $request->get('marca');
        $celulares->descripcion = $request->get('descripcion');
        $celulares->cantidad = $request->get('cantidad');
        $celulares->precio = $request->get('precio');

        $celulares->save();

        return redirect('/celulares');
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
        $celular = Celular::find($id);
        return view('celular.editC')->with('celular', $celular);
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
        $celular = Celular::find($id);
        $celular->marca = $request->get('marca');
        $celular->descripcion = $request->get('descripcion');
        $celular->cantidad = $request->get('cantidad');
        $celular->precio = $request->get('precio');

        $celular->save();

        return redirect('/celulares');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $celular = Celular::find($id);
        $celular->delete();
        return redirect('/celulares');
    }
}
