@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Perfil de Paciente | Servicio de Citas Médicas')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">v
<link rel="stylesheet" href="{{ asset('/css/confirmation.css') }}">
@endsection

@section('content')

<div class="container-conf">
    <!-- Imagen de confirmación -->
    <div class="contariner text-center">
        <img src="{{asset('/img/confirmacion.png')}}" class="img-fluid img-medium" alt="Imagen de confirmación">
    </div>

    <!-- Título "Verifica tus datos" -->
    <h4 class="mt-3 text-center">Tu cita ha sido confirmada</h4>

    <!-- Campo de Nombre del paciente -->
    <div class="form-group">
        <label>Nombre del paciente:</label>
        <h4> {{ $patientName }}</h4>
        <p>Fecha: {{ $startDateTime->format('d/m/Y') }}</p>
        <p>Hora: {{ $startDateTime->format('H:i') }}</p>

    </div>

    <!-- Campo de link de cita  -->
    <!-- <div class="form-group">
        <label>Link:</label>
        <p>
            <a href="https://cita-pnc-1234jkljlk2145-12314541415jkljlk-12j535jñlk">https://cita-pnc-1234jkljlk2145-12314541415jkljlk-12j535jñlk</a>
        </p>

    </div> -->

    <!-- Botones de Agendar y Cancelar -->
    <div class="row mt-3">
        <div class="col-md-6">
            <button class="btn btn-primary btn-block" id="agendarBtn">Imprimir</button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-danger btn-block" id="cancelarBtn">Regresar</button>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/locales/bootstrap-datepicker.es.min.js"></script>

@endsection