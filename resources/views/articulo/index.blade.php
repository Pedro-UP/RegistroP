@extends('layouts.plantillabase')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
    <h1> El Registro De Laptops </h1>
    <a href="articulos/create" class="btn btn-primary">CREAR</a>
    <br />
    <br />
    <table id="articulos" border="2" class="table table-dark table-hover shadow-lg mt-4" style="width:100%">
        <thead>
            <tr>
                <th hidden scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td hidden>{{ $articulo->id }}</td>
                    <td>{{ $articulo->marca }}</td>
                    <td>{{ $articulo->descripcion }}</td>
                    <td>{{ $articulo->cantidad }}</td>
                    <td>{{ $articulo->precio }}</td>

                    <td>
                        <img src="{{ asset('storage') . '/' . $articulo->imagen }}" width="200" height="100">
                    </td>

                    <td>
                        <a href="/articulos/{{ $articulo->id }}/edit" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger" onclick="return confirm('Deseas eliminar el articulo');"
                                type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#articulos').DataTable({
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "ALL"]
                ]
            });
        });
    </script>
@endsection
@endsection
