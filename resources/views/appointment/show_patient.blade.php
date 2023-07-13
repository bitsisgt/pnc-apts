@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Perfil de Paciente | Servicio de Citas Médicas')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('/css/carnet.css') }}">
@endsection

@section('content')
<div class="column">
    <div class="container-cnt">
            <div style="text-align: right">
                <a href="{{ route('main') }}">Regresar</a>
            </div>
        <div class="container">
            <h1 class="center">Carné</h1>
            <div class="code-div">
                <p class="p-code text-center">{{ $profile->dpi }}</p>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <p><strong>Nombre:</strong>  {{ $patient->name }}</p>
                    <p><strong>Dirección:</strong> {{ $profile->address }}</p>
                    <p><strong>DPI:</strong> {{ $profile->dpi }}</p>
                    <p><strong>Número Expediente Médico:</strong> {{ $patient->medical_number }}</p>
                    <p><strong>Género:</strong> {{ $profile->gender }}</p>
                    <p><strong>Fecha de nacimieto:</strong> {{ $profile->birth_date }}</p>
                </div>
                <div class="col-lg-3 center">
                    <div>
                        <img src="{{ (isset($patient) && isset($patient->profile->photo)) ? $patient->profile->photo : asset('/img/usuario.png') }}" alt="Imagen de usuario" class="user-image">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-6 button-container">
                <!-- <a href="{{ route('main') }}"  class="btn btn-primary btn-block mb-3">Imprimir</a>  -->
                <br>
                <img class="image-qr" src="{{ asset('img/codigo-qr.png') }}" alt="Código QR">
                <br>
                <p>Escanéa el carné</p>
            </div>
        </div>
    </div>

    <!-- <div class="container-cnt">
    </div> -->
</div>
@endsection

@section('js')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/locales/bootstrap-datepicker.es.min.js"></script>

@endsection