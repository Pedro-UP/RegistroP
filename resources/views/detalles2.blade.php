@extends('layouts.plantillabase')
@section('contenido')
<div class="container" >
        <div class="card" >
            <div class="card-header">Detalles Del Articulo</div>
            <div class="card-body" >
                <div height="200" width="500" >
                    <td >
                        <img class="rounded mx-auto d-block" src="{{ asset('storage') . '/' . $productoC->imagen }}"  width="50%"  >
                    </td>
                </div>
                <div class="col-md-4 ">
                    <H4>Nombre del Producto</H4>
                    <p>{{ $productoC->marca }}</p>
                    <H4>Descripcion del Producto</H4>
                    <p>{{ $productoC->descripcion }}</p>
                    <h4 class=" card-text">Cantidad de este Producto Existentes: </h4>
                    <p>{{ $productoC->cantidad }}</p>
                    <h4 class=" card-text">Precio del Producto:</h4>
                    <p> ${{ $productoC->precio }}</p>

                    <a href="{{ url('add-to-cart2/' . $productoC->id) }}"
                        class="btn btn-primary btn-lg btn-block" role="button"
                        aria-pressed="true">Agregar al Carrito</a>

                </div>
            </div>
        </div>
</div>
@endsection