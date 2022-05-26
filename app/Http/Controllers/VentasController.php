<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Articulo;

class VentasController extends Controller
{
    public function terminarVenta(Request $request)
    {
        // Crear una venta
        $venta = new Ventas();
        $venta->saveOrFail();
        $idVenta = $venta->id;
        $productos = $request->all();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $productoVendido = new Articulo();
            $productoVendido->fill([
                "id_venta" => $idVenta,
                "descripcion" => $producto->descripcion,
                "marca" => $producto->marca,
                "precio" => $producto->precio_venta,
                "cantidad" => $producto->cantidad,
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Articulo::find($producto->id);
            $productoActualizado->existencia -= $productoVendido->cantidad;
            $productoActualizado->saveOrFail();
        }
        return view('ventas.ventas_show');
    }
}
