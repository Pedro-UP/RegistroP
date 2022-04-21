@extends('layouts.plantillabase')

@section('contenido')
    <h1> Componentes Para Dispositivos Computacionales </h1>

    <a href="componentepcs/create" class="btn btn-primary">CREAR</a>

    <table border="2" class="table table-dark table-bordered border-dark table-hover mt-4">
        <thead>
                <th scope="col">ID</th>
                <th scope="col">Tipo de Componente</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach ($componentes as $componente)
                <tr class="table-warning">
                    <td>{{ $componente->id }}</td>
                    <td>{{ $componente->tipocomponente }}</td>
                    <td>{{ $componente->descripcion }}</td>
                    <td>{{ $componente->cantidad }}</td>
                    <td>{{ $componente->precio }}</td>
                    <td>
                        <a href="/componentepcs/{{ $componente->id }}/edit" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('componentepcs.destroy', $componente->id) }}" method="POST">
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
