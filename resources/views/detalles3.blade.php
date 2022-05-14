@extends('layouts.plantillabase')
@section('contenido')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Detalles Del Articulo</div>
            <div class="card-body">
                <div class="row justify-content-center ">
                    <td>
                        <img src="{{ asset('storage') . '/' . $productoPC->imagen }}" width="500" height="100%">
                    </td>
                </div>
                <div class="col-md-4">
                    <H4>Nombre del Producto</H4>
                    <p>{{ $productoPC->tipocomponente }}</p>
                    <H4>Descripcion del Producto</H4>
                    <p>{{ $productoPC->descripcion }}</p>
                    <h4 class=" card-text">Cantidad de este Producto Existentes:</h4>
                    <p>{{ $productoPC->cantidad }}</p>
                    <h4 class=" card-text">Precio del Producto:</h4>
                    <p>${{ $productoPC->precio }}</p>

                    <a href="{{ url('add-to-cart3/' . $productoPC->id) }}"
                        class="btn btn-primary btn-lg btn-block" role="button"
                        aria-pressed="true">Agregar al Carrito</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection