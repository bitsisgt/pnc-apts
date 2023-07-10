@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Iniciar Sesión | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/user-view.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4">
            <div class="text-align">
                <a href="{{ route('main') }}">Regresar</a>
            </div>
            <div class="card-content d-flex justify-content-between">
                <div>
                    <h2><strong>Nombre:</strong> {{ $patient->name }}</h2>
                    <div class="content">
                        <p><strong>DPI:</strong> {{ $profile->dpi }}</p>
                        <p><strong>Número Médico:</strong> {{ $patient->medical_number }}</p>
                        <p><strong>Fecha de Nacimiento:</strong> {{ $profile->birth_date }}</p>
                        <p><strong>Edad:</strong> {{ $profile->age }}</p>
                    </div>
                </div>
                <div class="img-content">
                    <img class="img-user" src="{{ asset('img/usuario.png') }}" alt="Entidad Gubernamental">
                </div>
            </div>
            <div class="mt-4 text-center">
            <a href="{{ route('patient.show', ['id' => $patient->id]) }}" class="btn btn-primary mb-3">Ver carnet</a>
                <!-- <br> -->
                <!-- <img src="{{ asset('img/codigo-qr.png') }}" alt="Código QR" width="200" height="200"> -->
            </div>
        </div>
    </div>
@endsection
