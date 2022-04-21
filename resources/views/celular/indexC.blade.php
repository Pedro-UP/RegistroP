@extends('layouts.plantillabase')

@section('contenido')
    <h1> Vista del Index </h1>

    <a href="celulares/create" class="btn btn-primary">CREAR</a>

    <table border="2" class="table table-bordered border-dark table-hover mt-4">
        <thead>
            <tr class="bg-primary">
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
            @foreach ($celulares as $celular)
                <tr class="table-primary">
                    <td>{{ $celular->id }}</td>
                    <td>{{ $celular->marca }}</td>
                    <td>{{ $celular->descripcion }}</td>
                    <td>{{ $celular->cantidad }}</td>
                    <td>{{ $celular->precio }}</td>
                    <td>
                        <a href="/celulares/{{ $celular->id }}/edit" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('celulares.destroy', $celular->id) }}" method="POST">
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
