@extends('dashboard')
@section('title', 'Login')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('content')
    <div class="container login-form">
        <h2 class="mt-4 text-center">Iniciar sesión</h2>
        <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="form-group">
                <label for="email">Usuario:</label>
                <input type="text" class="form-control" id="email" name="email" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Recordar contraseña</label>
            </div>

            <div class="form-group group-buttons">
                <button type="submit" class="btn btn-success mt-3">Entrar</button>
                <button type="button" class="btn btn-primary mt-3"
                    onclick="window.location.href='registro.html'">Registrarse</button>
            </div>
        </form>

        <div class="mt-3">
            <a href="olvidar_contraseña.html">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
@endsection
