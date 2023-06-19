@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Panel Principal de Pacientes | Servicio de Citas Médicas')

@section('content')
<!-- The Modal -->
<div class="modal" id="erroModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Problemas con perfil</h4>
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Parece que su usuario no posee ningún perfil de paciente. Es necesario que cree un perfil para agendar citas.

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<div class="card" style="width: 1200px">
    <div class="card-header d-flex justify-content-between">
        <h5>Agendar Cita</h5>
        <a href="{{ route('main') }}">Regresar</a>
    </div>
    <div class="card-body">
        <form class="form-inline justify-content-end">
            <div class="form-group mx-sm-3 mb-2">
              <label for="sucursal" class="mr-2">Sucursal</label>
              <select id="sucursal" class="form-control">
                <option selected>Seleccionar</option>
                <option value="sucursal1">Sucursal 1</option>
                <option value="sucursal2">Sucursal 2</option>
                <option value="sucursal3">Sucursal 3</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="paciente" class="mr-2">Paciente</label>
              <input type="text" class="form-control" id="paciente">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="especialidad" class="mr-2">Especialidad</label>
              <select id="especialidad" class="form-control">
                <option selected>Seleccionar</option>
                <option value="especialidad1">Especialidad 1</option>
                <option value="especialidad2">Especialidad 2</option>
                <option value="especialidad3">Especialidad 3</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="doctor" class="mr-2">Doctor</label>
              <select id="doctor" class="form-control">
                <option selected>Seleccionar</option>
                <option value="doctor1">Doctor 1</option>
                <option value="doctor2">Doctor 2</option>
                <option value="doctor3">Doctor 3</option>
              </select>
            </div>
            <button type="submit" class="btn btn-warning text-light mb-2">Buscar</button>
          </form>


        <!-- CON BOTON DE CIERRE LA X -->
        <!-- Calendario y formulario de eventos -->
        <div id="calendar"></div>
        <div id="eventForm" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Agregar Evento</h5>
            <span class="close">&times;</span>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="title">Título:</label>
              <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
              <label for="start">Inicio:</label>
              <input type="datetime-local" class="form-control" id="start">
            </div>
            <div class="form-group">
              <label for="end">Fin:</label>
              <input type="datetime-local" class="form-control" id="end">
            </div>
          </div>
          <div class="modal-footer">
            <button id="addEvent" class="btn btn-primary">Agregar</button>
            <button id="cancel" class="btn btn-danger">Cancelar</button>
          </div>
        </div>
    </div>
  </div>
@endsection
