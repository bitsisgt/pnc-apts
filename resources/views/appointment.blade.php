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
    <!-- The Modal -->
    <div class="modal" id="horarioModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Reserva de Cita</h4>
                    <button type="button" class="btn-close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <form action="{{ route('reserve.appointment') }}" method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="horarios">
                            <div class="row text-center">
                                <h5>Horarios Disponibles</h5>
                            </div>
                            <div id="horarios-buttons">
                            </div>
                        </div>
                        <div id="confirmacion">
                            <div class="row text-center">
                                <h5>Confirme sus datos</h5>
                            </div>
                            <input type="text" id="patient_ap" class="form-control " name="patient_ap" value=""
                                hidden>
                            <input type="text" id="availability" class="form-control" name="availability" value=""
                                hidden>
                            <input type="text" id="date_a" class="form-control" name="date_a" value=""
                                hidden>
                            <div class="form-group mb-3 col-6">
                                <label class="font-weight-bold" for="address">Paciente:</label>
                                <input type="text" id="patient" class="form-control" name="patient" value="" disabled>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label class="font-weight-bold" for="address">Doctor:</label>
                                <input type="text" id="doctor" class="form-control" name="doctor" value="" disabled>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label class="font-weight-bold" for="address">Fecha:</label>
                                <input type="text" id="date" class="form-control" name="date" value="" disabled>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label class="font-weight-bold" for="address">Horario:</label>
                                <input type="text" id="start" class="form-control" name="start" value="" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type=button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                        <button type="submit" id="save-button" class="btn btn-primary"><i class="fa fa-calendar-check-o"
                                aria-hidden="true"></i>&nbsp;Reservar</button>
                    </div>
                </form>

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
        @if (isset($events))
            function processNext(element) {
                console.log(element.value);
                $('#availability').val(element.value);
                $('#start').val(element.innerHTML);
                $('#horarios').hide();
                $('#save-button').show();
                $('#confirmacion').show();
            }

            async function get_availabilities(day) {
                let data = {
                    "doctor_id": $('#doctor_id').val(),
                    "patient_id": $('#patient_id').val(),
                    "hospital_id": $('#hospital_id').val(),
                    "speciality_id": $('#speciality_id').val(),
                    "day": day,
                    "_token": "{{ csrf_token() }}",
                };
                $.post("{{ url('appointment/availabilities') }}", data, (result) => {
                    $('#horarios-buttons').empty();
                    for(const d in result) {
                        console.log(d);
                        $('#horarios-buttons').append(
                            '<button type="button" onclick=processNext(this) value="' + result[d].id +
                            '" class="btn btn-primary btn-lg btn-block">' + Number.parseInt(result[d]
                                .start_hour) +
                            ':00 a ' + Number.parseInt(result[d].end_hour) + ':00</button>');
                    }
                    $('#date').val(day);
                    $('#date_a').val(day);
                    $('#doctor').val($('#doctor_id option:selected').text());
                    $('#hospital').val($('#hospital_id option:selected').text());
                    $('#patient').val($('#patient_id option:selected').text());
                    $('#patient_ap').val($('#patient_id').val());
                    $('#horarios').show();
                    $('#save-button').hide();
                    $('#confirmacion').hide();
                    $('#horarioModal').modal('show');
                }).fail(function(error) {
                    console.log(error)
                });;
            }

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
                        get_availabilities(clickedDate.toISODate());
                    }
                });
                // Renderizar el calendario
                calendar.render();
            });
        @endif
    </script>
@endsection
