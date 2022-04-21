@extends('layouts.plantillabase')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
    <h1> Componentes Para Dispositivos Computacionales </h1>

    <a href="componentepcs/create" class="btn btn-primary">CREAR</a>
    <br/>
    <br/>

    <table id="componentepcs" border="2" class="table table-dark table-bordered border-dark table-hover shadow-lg mt-4"
        style="width:100%">
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#componentepcs').DataTable({
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "ALL"]
                ]
            });
        });
    </script>
@endsection
@endsection
