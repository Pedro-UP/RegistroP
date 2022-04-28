@extends('layouts.plantillabase');

@section('contenido')
    <h2>Editar Los Celulares</h2>

    <form action="/celulares/{{ $celular->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{ $celular->marca }}">
        </div>
        <div class="mb-3" <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control"
                value="{{ $celular->descripcion }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{ $celular->cantidad }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control"
                value="{{ $celular->precio }}">
        </div>

        <div class="mb-3">
            <input name="imagen" id="imagen" type="file" value="{{ $celular->imagen }}">
        </div>

        <a href="/celulares" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    @endsection
