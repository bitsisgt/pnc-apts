@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Gestión de pacientes | Servicio de Citas Médicas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

@endsection

@section('content')
@include('menu')
    <div class="container">
        <div class="card">
            <div class="card-header">Gestión de Pacientes</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @stack('scripts')
@endsection