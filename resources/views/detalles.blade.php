@extends('layouts.plantillabase')
@section('contenido')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Detalles Del Articulo</div>
            <div class="card-body">
                <div class="row justify-content-center ">
                    <td>
                        <img src="{{ asset('storage') . '/' . $productoA->imagen }}" width="500" height="100%">
                    </td>
                </div>
                <div class="col-md-4 ">
                    <H4>Nombre del Producto</H4>
                    <p>{{ $productoA->marca }}</p>
                    <H4>Descripcion del Producto</H4>
                    <p>{{ $productoA->descripcion }}</p>
                    <h4 class=" card-text">Cantidad de este Producto Existentes: </h4>
                    <p>{{ $productoA->cantidad }}</p>
                    <h4 class=" card-text">Precio del Producto:</h4>
                    <p>${{ $productoA->precio }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection