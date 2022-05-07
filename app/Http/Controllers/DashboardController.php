<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Celular;
use App\Models\ComponentesPC;

class DashboardController extends Controller
{
    public function index()
    {
        $productosA= Articulo::all();
        $productosC= Celular::all();
        $productosPC= ComponentesPC::all();
        return view('dashboard', compact('productosA', 'productosC', 'productosPC'));
    }


}
