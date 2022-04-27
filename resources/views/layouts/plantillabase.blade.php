<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TecNoVenta</title>

</head>

<body>
    <h1 class="bg-warning text-Black text-center">Registro de Articulos Computacionales</h1>

    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;" style="width:80%">
            <a class="nav-item navbar-brand" href="{{ route('dashboard') }}"> INICIO </a>
            <a class="nav-item nav-link" href="{{ route('celulares.index') }}"> CELULARES </a>
            <a class="nav-item nav-link" href="{{ route('articulos.index') }}"> LAPTOPS </a>
            <a class="nav-item nav-link" href="{{ route('componentepcs.index') }}"> COMPONENTES PCS </a>
        </nav>
    </header>

    <div class="container">
        @yield('contenido')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>
