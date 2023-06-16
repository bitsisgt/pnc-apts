@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Iniciar Sesión | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('content')
    <div class="container login-form bg-light">
        <h3 class="mt-4 text-center">Iniciar Sesión</h3>
        <hr class="border border-primary border-3">
        <p>
            Ingrese sus datos de usuario para entrar al servicio
        </p>
        @if ($errors->has('login'))
            <div class="alert alert-danger" role="alert">
                <span>{{ $errors->first('login') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold" for="email">NIP / Correo Electrónico:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="NIP / Correo Eléctronico" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Recordar contraseña</label>
            </div>
            <div class="form-group group-buttons d-flex justify-content-between">
                <button type="submit" class="btn btn-primary mt-3">Entrar al Sistema</button>
                <button type="button" class="btn btn-secondary mt-3">Crear Nuevo Usuario</button>
            </div>
        </form>
        <hr class="border border-secondary border-3">
        <div class="mt-3">
            <a href="{{ route('forgot') }}">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
@endsection
