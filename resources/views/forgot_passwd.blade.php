@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Ólvide mi contraseña | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/background.css') }}">

@endsection


@section('content')
    <div class="container login-form bg-light">
        <h3 class="mt-4 text-center">Has olvidado tu contraseña</h3>
        <hr class="border border-warning border-3">
        <p>
            Ingrese su NIP o correo electrónico
        </p>
        @if ($errors->has('email'))
            <div class="alert alert-danger" role="alert">
                <span>{{ $errors->first('email') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('password.reset') }}">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold" for="email">NIP / Correo Electrónico:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="NIP / Correo Electrónico" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group group-buttons d-flex justify-content-between">
                <button type="submit" class="btn btn-primary mt-3">Cambiar Contraseña</button>
            </div>
        </form>
        @if (!Auth::check())
        <hr class="border border-primary border-3">
        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('login') }}">Regresar al inicio de sesión</a>
            <a href="{{ route('registration') }}">Crear nuevo usuario</a>
        </div>
        @endif
    </div>
@endsection


