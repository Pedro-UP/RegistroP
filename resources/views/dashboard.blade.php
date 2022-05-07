    <x-app-layout>
        <main>
            <a href="{{ url('/cart/') }}"
                class="btn btn-primary btn-lg btn-block" role="button"
                aria-pressed="true">Ver el Carrito</a>

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
                                            class="btn btn-primary btn-lg btn-block" role="button"
                                            aria-pressed="true">Agregar al Carrito</a>

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
                                                class="btn btn-primary btn-lg btn-block" role="button"
                                                aria-pressed="true">Agregar al Carrito</a>

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
                                                class="btn btn-primary btn-lg btn-block" role="button"
                                                aria-pressed="true">Agregar al Carrito</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    {{-- {!! $productos->links() !!} --}}
                </div>
            </div>
        </main>
    </x-app-layout>
