@extends('dashboard')
@section('title',
    'Subdirección General De Salud Policial SISAP | Página de Error | Servicio de Citas
    Médicas')
@section('css')
    <link href="{{ asset('/css/error.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/background.css') }}">
@endsection

@section('content')
    <div class="container text-center">
        <img src="{{ asset('img/img-error.png') }}" alt="Error" class="img-fluid">
        <h1 class="display-1 text-white font-weight-bold">404</h1>
        <h2 class="font-weight-bold display-4 text-white">Error de la página</h2>
        <p class="lead text-white">Ha ocurrido un error en la página. Por favor, inténtelo de nuevo más tarde.</p>
        <a href="{{ route('main') }}" class="btn btn-lg btn-block btn-outline-light">Regresar al inicio</a>
    </div>
@endsection