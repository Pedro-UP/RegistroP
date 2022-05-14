<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Celular;
use App\Models\ComponentesPC;

class InicioController extends Controller
{
    public function index(Request $peticion){
        /* $arreglo = ['nombre'=>$peticion->query('nombre', 'NN')];
        return view('vista1')->with($arreglo); */
        //return view('vista1');

        $productosA= Articulo::all();
        $productosC= Celular::all();
        $productosPC= ComponentesPC::all();
        return view('vista1', compact('productosA', 'productosC', 'productosPC'));
    }
}
