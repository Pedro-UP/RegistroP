@extends('layouts.plantillabase')

@section('contenido')
    <h2>Editar Laptop</h2>

    <form action="/articulos/{{ $articulo->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{ $articulo->marca }}">
        </div>
        <div class="mb-3" >
        <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control"
                value="{{ $articulo->descripcion }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{ $articulo->cantidad }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control"
                value="{{ $articulo->precio }}">
        </div>

        <div class="mb-3">
            <input name="imagen" id="imagen" type="file" value="{{ $articulo->imagen }}">
        </div>

        <a href="/articulos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    @endsection
