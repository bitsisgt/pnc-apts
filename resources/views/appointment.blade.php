@extends('dashboard')
@section('title',
    'Subdirección General De Salud Policial SISAP | Panel Principal de Pacientes | Servicio de Citas
    Médicas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/appointment.css') }}">
@endsection

@section('content')
    <!-- The Modal -->
    <div class="modal" id="erroModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Problemas con perfil</h4>
                    <button type="button" class="btn-close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Parece que su usuario no posee ningún perfil de paciente. Es necesario que cree un perfil para agendar
                    citas.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="{{ route('user.patient') }}" class="btn btn-primary">Crear perfil de paciente</a>
                    <a href="{{ route('main') }}" class="btn btn-danger">Cancelar</a>
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
            <form action="{{ route('appointment.calendar') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-6 mb-2">
                        <label for="hospital_id" class="font-weight-bold">Hospital</label>
                        <select id="hospital_id" name="hospital_id" class="form-control form-select">
                            @foreach ($hospitals as $hospital)
                                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="patient_id" class="font-weight-bold">Paciente</label>
                        <select id="patient_id" name="patient_id" class="form-control form-select">
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6 mb-2">
                        <label for="speciality_id" class="font-weight-bold">Especialidad</label>
                        <select id="speciality_id" name="speciality_id" class="form-control form-select">
                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="doctor_id" class="font-weight-bold">Doctor</label>
                        <div class="input-group">
                            <select id="doctor_id" name="doctor_id" class="form-control form-select">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary text-light"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="border border-secondary border-3">
            <!-- Calendario y formulario de eventos -->
            <div id="calendar"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/fullcalendar/index.global.min.js') }}"></script>
    <script src="{{ asset('/js/fullcalendar/es.global.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@1.25.0/build/global/luxon.min.js"></script>
    <script>
        @if (isset($error))
            $(window).on('load', function() {
                $('#erroModal').modal('show');
            });
        @endif
    </script>
    <script>
        @if(isset($events))
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el elemento del calendario
            var calendarEl = document.getElementById('calendar');

            // Crear una instancia de FullCalendar con la configuración deseada
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es', // Configurar el idioma en español

                initialDate: new Date(), // Establecer la fecha inicial del calendario como la fecha actual

                editable: true,
                selectable: true,
                businessHours: true,
                dayMaxEvents: false,
                showNonCurrentDates: false,
                events: @json($events),
                eventClick: function(info) {
                    // Obtener la fecha y hora del día clicado
                    var date = info.event.start;

                    var today = luxon.DateTime.local().startOf('day');
                    var clickedDate = luxon.DateTime.fromJSDate(date).startOf('day');

                    // Verificar si la fecha seleccionada es anterior a la fecha actual
                    if (clickedDate < today) {
                        alert('No puedes seleccionar una fecha pasada.');
                        return;
                    }

                    alert('Event: ' + info.event.title);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('View: ' + info.view.type);

                    // change the border color just for fun
                    info.el.style.borderColor = 'red';
                }
            });
            // Renderizar el calendario
            calendar.render();
        });
        @endif
    </script>
@endsection
