@extends('layouts.plantillabase')
@section('contenido')
    <?php $valor = 0; ?>

    @if (session('cart'))
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
                <?php $valor += $detalles['precio'] * $detalles['quantity']; ?>
                <tr>

                    <td>{{ $detalles['marca'] }}</td>

                    <td>{{ $detalles['descripcion'] }}</td>
                    <td>{{ $detalles['quantity'] }}</td>
                    <td>{{ $detalles['precio'] }}</td>

                    <td width="25%">
                        <img width="40%" src="{{ asset('storage') . '/' . $detalles['imagen'] }}" class="rounded mx-auto d-block">
                    </td>

                    <td width="15%">
                        <a href="{{ url('delete/' . $detalles['quantity']) }}" class="btn btn-primary btn-lg btn-block"
                            role="button" class="btn btn-danger">Vaciar el Carrito</button> </a>
                    </td>

                </tr>
            @endforeach
        </table>

            <h3>Total del Precio <span class="btn btn-primary">${{ $valor }}</span></h3>

    @else
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">¡No hay Articulos en Existencia!</h4>
            <p>Aun no se ha agregado ningun articulo al carrito.</p>
            <hr>
            <p class="mb-0">Ingrese Nuevos Articulos al Carrito <a href="{{ url('/dashboard/') }}"
                    class="btn btn-outline-success rounded-pill">Agregar Nuevo Articulos</a> </p>
        </div>
    @endif
@endsection
