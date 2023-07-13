@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | cambiar contraseña | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/background.css') }}">
@endsection

@section('content')
    <div class="container login-form bg-light">
        <h3 class="mt-4 text-center">Cambiar Contraseña</h3>
        <hr class="border border-warning border-3">
        <p>
            Ingrese la nueva contraseña
        </p>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold" for="password">Nueva Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nueva Contraseña" required>
            </div>
            <div class="form-group">
                <label class="font-weight-bold" for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            </div>
            <input type="hidden" name="email" value="{{ isset($email) ? $email : '' }}">
            <div class="form-group group-buttons d-flex justify-content-between">
                <button type="submit" class="btn btn-primary mt-3">Cambiar Contraseña</button>
                <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Regresar</a>
            </div>
        </form>
    </div>
@endsection


