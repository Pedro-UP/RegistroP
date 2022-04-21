@extends('layouts.plantillabase');

@section('contenido')
<h2>Editar Los Componentes Para Las PCs</h2>

<form action="/componentepcs/{{$componente->id}}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Componente</label>
        <input id="tipocomponente" name="tipocomponente" type="text" class="form-control" value="{{ $componente->tipocomponente }}">
    </div>
    <div class="mb-3"
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{ $componente->descripcion }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{ $componente->cantidad }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" value="{{ $componente->precio }}">
    </div>
    <a href="/componentepcs" class="btn btn-secondary" >Cancelar</a>
    <button type="submit" class="btn btn-primary" >Guardar</button>
@endsection