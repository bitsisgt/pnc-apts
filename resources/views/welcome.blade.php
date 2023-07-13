@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/background.css') }}">
@endsection

@section('content')
    <div class="container welcome-container text-center bg-light border border-3 rounded">
        <img class="log-img-sm" src="./img/logo-round.png" class="mr-2" alt="Logo Policia Nacional Civil">
        <h3 class="mt-4">Bienvenido al Servicio de Citas Médicas</h3>
        <hr class="border border-warning border-3">
        <p>
            Para utilizar el servicio de citas médicas debe poseer una cuenta con contraseña.
        </p>
        <div class="container text-center d-grid gap-2 col-8 mx-auto">
            <a href="{{ route('login') }}" class="btn btn-primary col-8 mb-4 btn-welcome">Ya Tengo Un Usuario</a>
            <a href="{{ route('registration') }}" class="btn btn-primary col-8 mb-4 btn-welcome">Crear Un Nuevo Usuario</a>
        </div>
        <hr class="border border-warning border-3">
        <div class="mt-3">
            <a href="{{ route('forgot.passwd') }}">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
@endsection
