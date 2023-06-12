<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand text-dark" href="#">
            <img src="./img/cita.png" width="30" height="30" class="mr-2" alt="Logo del sistema">
            Sistemas Citas PNC
        </a>
        <div class="navbar-collapse justify-content-center"></div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link text-dark" href="#" id="menuDropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    Usuario
                    <img src="./img/usuario.png" alt="Usuario" class="user-icon">
                </a>
            </li>
        </ul>
    </nav>
    <div class="main-container container mt-4">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="row text-center">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <h5>Dirección</h5>
                    <p>Dirección de la empresa</p>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Teléfono: 123-456-7890</p>
                </div>
            </div>
        </div>
    </footer>
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> -->
</body>

</html>
