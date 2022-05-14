<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>


<title> Productos Computacionales </title>

<h2 class="bg-warning text-Black text-center">
    <div class="container">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    Todo Tipo De Computadoras Y Diversidad De Dispositivos Moviles
</h2>


<div class="album py-5 bg-light">
    <div class="container">
        <th scope="col">LAPTOPS</th><br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($productosA as $producto)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="rounded mx-auto d-block" width="300" height="300"
                            src="{{ asset('storage') . '/' . $producto->imagen }}" alt="">
                        <div class="card-body text-center">
                            <h4>{{ $producto->marca }}</h4>
                            <p class=" card-text">Precio del Producto: ${{ $producto->precio }}</p>
                            <a href="{{ url('/detalles/' . $producto->id) }}"
                                class="btn btn-outline-success rounded-pill">Ver Producto</a>

                            <a href="{{ url('add-to-cart1/' . $producto->id) }}"
                                class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Agregar al
                                Carrito</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        {{-- {!! $productos->links() !!} --}}
    </div>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <th scope="col">CELULARES</th><br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($productosC as $producto)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="rounded mx-auto d-block" width="300" height="300"
                            src="{{ asset('storage') . '/' . $producto->imagen }}" alt="">
                        <div class="card-body text-center">
                            <h4>{{ $producto->marca }}</h4>
                            <p class=" card-text">Precio del Producto: ${{ $producto->precio }}</p>
                            <a href="{{ url('/detalles2/' . $producto->id) }}"
                                class="btn btn-outline-success rounded-pill">Ver Producto</a>

                            <a href="{{ url('add-to-cart2/' . $producto->id) }}"
                                class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Agregar al
                                Carrito</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        {{-- {!! $productos->links() !!} --}}
    </div>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <th scope="col">COMPONENTES DE PCs</th><br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($productosPC as $producto)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="rounded mx-auto d-block" width="300" height="300"
                            src="{{ asset('storage') . '/' . $producto->imagen }}" alt="">
                        <div class="card-body text-center">
                            <h4>{{ $producto->tipocomponente }}</h4>
                            <p class=" card-text">Precio del Producto: ${{ $producto->precio }}</p>
                            <a href="{{ url('/detalles3/' . $producto->id) }}"
                                class="btn btn-outline-success rounded-pill">Ver Producto</a>

                            <a href="{{ url('add-to-cart3/' . $producto->id) }}"
                                class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Agregar al
                                Carrito</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        {{-- {!! $productos->links() !!} --}}
    </div>
</div>
