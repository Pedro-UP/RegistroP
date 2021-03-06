@extends('layouts.plantillabase');

@section('contenido')
    <h2>Registrar Componentes De PCs</h2>

    <form action="/componentepcs" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Componente</label>
            <input id="tipocomponente" name="tipocomponente" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="4">
        </div>

        <div class="mb-3">
            <input name="imagen" id="imagen" type="file">
        </div>

        <a href="/componentepcs" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@endsection
