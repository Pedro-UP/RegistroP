@extends('layouts.plantillabase')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
    <h1> Registro De Celulares </h1>

    <a href="celulares/create" class="btn btn-primary">CREAR</a>
    <br/>
    <br/>

    <table id="celulares" border="2" class="table table-bordered border-dark table-hover shadow-lg mt-4" style="width:100%">
        <thead>
            <tr class="bg-primary">
                <th hidden>ID</th>
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
            @foreach ($celulares as $celular)
                <tr class="table-primary">
                    <td hidden>{{ $celular->id }}</td>
                    <td>{{ $celular->marca }}</td>
                    <td>{{ $celular->descripcion }}</td>
                    <td>{{ $celular->cantidad }}</td>
                    <td>{{ $celular->precio }}</td>
                    
                    <td>
                        <img src="{{ asset('storage'). '/' .$celular->imagen}}" width="200" height="100">
                    </td>

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
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#celulares').DataTable({
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "ALL"]
                ]
            });
        });
    </script>
@endsection
@endsection
