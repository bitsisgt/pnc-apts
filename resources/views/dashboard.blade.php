<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/css/background.css') }}"> -->
    @yield('css')
</head>

<body>
    <div class="page-container">
    <nav class="navbar navbar-expand-lg navbar-light navbar-menu">
        <a class="text-decoration-none d-inline-flex align-items-center" href="{{ route('index') }}">
            <div class="logo-title-container">
                <img class="logo-sishospi" src="/img/logo-round-bg.png" height="60" class="mr-2" alt="Logo ministerio de gobernación">
                <h1 class="h3 logo-title"> SISTEMA DE CONTROL HOSPITALARIO SISHOSPI</h1>
            </div>
        </a>
        <div class="navbar-collapse justify-content-center"></div>
        @auth
        <ul class="navbar-nav ml-auto">
            <div class="nav-item dropdown">
                <a class="nav-link text-dark" href="#" data-toggle="dropdown" id="menuDropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    {{ Auth::user()->email }}
                    <img src="{{ Auth::user()->get_default_photo() }}" alt="Usuario" class="user-icon">
                </a>
                <div class="dropdown-menu" aria-labelledby="menuDropdown">
                    <a class="dropdown-item" href="#">Ver Perfil</a>
                    <a class="dropdown-item" href="{{ route('forgot.passwd') }}">Cambiar Contraseña</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('signout') }}">Cerrar Sesión</a>
                  </div>
            </div>
        </ul>
        @endauth
    </nav>
    <div class="main-container container ">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" id="danger-alert" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @yield('content')
    </div>

    <!-- <footer class="footer text-white btn-outline-light .form-white"> -->
        
    <footer class="footer text-white .form-white">
        <div class="footer-container">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md-2">
                    <div class="zoom-link">
                        <a href="#" class="text-white text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f8f9fa}</style><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                            <h5>Manual</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="zoom-link">
                        <a href="mailto:citasmedicas@pnc.gob.gt" class="text-white text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f8f9fa}</style><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                            <h5>citasmedicas@pnc.gob.gt</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="zoom-link">
                        <a href="tel:2200-1580" class="text-white text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f8f9fa}</style><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                            <h5>2200-1580</h5>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="zoom-link">
                        <a href="#" class="text-white text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                            <h5>5550-1234</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <div id="preloader" class="showbox">
            <div id="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterLimit="10" />
                </svg>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> -->
    <script>
        setTimeout(() => {
            $('#success-alert').hide();
            $('#danger-alert').hide();
        }, 5000);
    </script>
    <script>
        window.addEventListener('scroll', () => {
            let headerScroll = document.querySelector('.navbar-menu');
            headerScroll.classList.toggle('header-sticky', window.scrollY > 0);
        }); 
    </script>
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     var loader = document.querySelector(".showbox");
        //     loader.style.display = "none";
        // });
        // Ocultar el preloader después de 3 segundos (3000 ms)
        document.addEventListener("DOMContentLoaded", function() {
            var preloader = document.getElementById("preloader");
            preloader.classList.add("hidebox");

            // Eliminar el preloader del DOM después de la transición
            setTimeout(function() {
                preloader.parentNode.removeChild(preloader);
            }, 500); // Tiempo de transición (0.5 segundos) + retardo adicional (0.5 segundos)
        });
    </script>
    @yield('js')
</body>

</html>
