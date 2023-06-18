@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Panel Principal de Pacientes | Servicio de Citas Médicas')

@section('content')
<div class="card" style="width: 1200px">
    <div class="card-header d-flex justify-content-between">
        <h5>Servicio de Citas Médicas</h5>
        <a href="{{ route('signout') }}">Cerrar Sesión</a>
    </div>
    <div class="card-body">
        <div class="card-group">
            <div class="card-deck">
                <div class="card">
                  <img class="card-img-top p-4" src="{{ asset('img/calendar.png') }}" alt="agendar">
                  <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('appointment') }}">Agenda tu Cita</a></h5>
                    <p class="card-text">Servicio para agendar tu cita médica.</p>
                    <a href="{{ route('appointment') }}" class="btn btn-primary btn-lg btn-block">Agendar Cita</a>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top p-4" src="{{ asset('img/calendar2.png') }}" alt="cancelar">
                  <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('admin.appointment') }}">Cancelar una Cita</a></h5>
                    <p class="card-text">Adminsitra tus citas, ver tu historial y cancelar citas.</p>
                    <a href="{{ route('admin.appointment') }}" class="btn btn-primary btn-lg btn-block">Cancelar Cita</a>
                  </div>
                </div>
                <div class="card">
                    <img class="card-img-top p-4" src="{{ asset('img/doctor.png') }}" alt="perfil">
                    <div class="card-body">
                      <h5 class="card-title">Perfil de Pacientes</h5>
                      <p class="card-text">Crea y actualiza los perfiles de los pacientes.</p>
                      <a href="#" class="btn btn-primary btn-lg btn-block">Adminitrar Perfiles</a>
                    </div>
                  </div>
                <div class="card">
                  <img class="card-img-top p-4" src="{{ asset('img/printer.png') }}" alt="printer">
                  <div class="card-body">
                    <h5 class="card-title">Carnet Médico</h5>
                    <p class="card-text">Consulta e imprime tu carnet médico.</p>
                    <a href="#" class="btn btn-primary btn-lg btn-block">Imprimir Carnet</a>
                  </div>
                </div>
              </div>
          </div>
    </div>
  </div>
@endsection
