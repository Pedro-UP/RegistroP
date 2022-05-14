@extends('layouts.plantillabase')
@section('contenido')
    <?php $valor = 0 ?>

    @if(session('cart'))

    <table class="table">
        <thead>
            <tr>
                <th hidden scope="col">ID</th>
                <th scope="col">Nombre del Equipo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>

        @foreach (session('cart') as $id => $detalles)
        <?php $valor += $detalles['precio']* $detalles['quantity'] ?>
            <tr>

                <td>{{ $detalles['marca'] }}</td>

                <td>{{ $detalles['descripcion'] }}</td>
                <td>{{ $detalles['quantity'] }}</td>
                <td>{{ $detalles['precio'] }}</td>

                <td width="25%">
                    <img src="{{ asset('storage') . '/' . $detalles['imagen'] }}" width="200" height="100">
                </td>

                <td width="15%">
                    <a href="{{ url('delete/' . $detalles['quantity']) }}"
                        class="btn btn-primary btn-lg btn-block" role="button"
                    class="btn btn-danger">Eliminar Todo el Carrito</button> </a>
                </td>

            </tr>
        @endforeach
    </table>

    <div class=''>
        <p>Total del Precio ${{ $valor}}</p>
    </div>
    @endif
@endsection

