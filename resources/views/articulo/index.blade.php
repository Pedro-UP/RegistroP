@extends('layouts.plantillabase');

@section('contenido')
    <h1> Vista del Index </h1>
    <a href="articulos/create" class="btn btn-primary">CREAR</a>

    <table border="2" class="table table-dark table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->marca }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td>{{ $articulo->cantidad }}</td>
                    <td>{{ $articulo->precio }}</td>
                    <td>
                        <a href="/articulos/{{ $articulo->id }}/edit" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" onclick="return confirm('Deseas eliminar el articulo');"
                                type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
