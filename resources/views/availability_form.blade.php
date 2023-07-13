@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Perfil de Paciente | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
@endsection


@section('content')
    <div class="card mb-8" style="width: 1200px; margin-bottom: 80px">
        <div class="card-header d-flex justify-content-between">
            <h5>Disponibilidad del Doctor: {{ isset($availability) ? $availability->id : 'Nueva' }}</h5>
            <a href="{{ route('main') }}">Regresar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel"
                            aria-labelledby="v-pills-personal-tab">
                            <form action="{{ url('availability/'.(isset($availability) && $availability->id!==null ? 'update' : 'profile')) }}" method="POST">
                                @csrf
                                <input type="text" id="id" class="form-control"
                                    name="id" value="{{ isset($availability) ? $availability->id : '' }}" hidden>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="doctor_id">ID del Doctor:</label>
                                    <input type="text" placeholder="ID del Doctor" id="doctor_id" class="form-control"
                                        name="doctor_id" value="{{ isset($availability) ? $availability->doctor_id : old('doctor_id') }}" required>
                                    @if ($errors->has('doctor_id'))
                                        <span class="text-danger">{{ $errors->first('doctor_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="hospital_id">ID del Hospital:</label>
                                    <input type="text" placeholder="ID del Hospital" id="hospital_id" class="form-control"
                                        name="hospital_id" value="{{ isset($availability) ? $availability->hospital_id : old('hospital_id') }}" required>
                                    @if ($errors->has('hospital_id'))
                                        <span class="text-danger">{{ $errors->first('hospital_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="speciality_id">ID de la Especialidad:</label>
                                    <input type="text" placeholder="ID de la Especialidad" id="speciality_id" class="form-control"
                                        name="speciality_id" value="{{ isset($availability) ? $availability->speciality_id : old('speciality_id') }}" required>
                                    @if ($errors->has('speciality_id'))
                                        <span class="text-danger">{{ $errors->first('speciality_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="day_of_week">Día de la Semana:</label>
                                    <select id="day_of_week" class="form-control" name="day_of_week" required>
                                        <option value="Lunes" {{ isset($availability) && $availability->day_of_week === 'Lunes' ? 'selected' : '' }}>Lunes</option>
                                        <option value="Martes" {{ isset($availability) && $availability->day_of_week === 'Martes' ? 'selected' : '' }}>Martes</option>
                                        <option value="Miércoles" {{ isset($availability) && $availability->day_of_week === 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                                        <option value="Jueves" {{ isset($availability) && $availability->day_of_week === 'Jueves' ? 'selected' : '' }}>Jueves</option>
                                        <option value="Viernes" {{ isset($availability) && $availability->day_of_week === 'Viernes' ? 'selected' : '' }}>Viernes</option>
                                        <option value="Sábado" {{ isset($availability) && $availability->day_of_week === 'Sábado' ? 'selected' : '' }}>Sábado</option>
                                        <option value="Domingo" {{ isset($availability) && $availability->day_of_week === 'Domingo' ? 'selected' : '' }}>Domingo</option>
                                    </select>
                                    @if ($errors->has('day_of_week'))
                                        <span class="text-danger">{{ $errors->first('day_of_week') }}</span>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel"
                            aria-labelledby="v-pills-personal-tab">
                            <form action="{{ url('availability/'.(isset($availability) && $availability->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="start_hour">Hora de Inicio:</label>
                                    <input type="time" id="start_hour" class="form-control"
                                        name="start_hour" value="{{ isset($availability) ? $availability->start_hour : old('start_hour') }}" required>
                                    @if ($errors->has('start_hour'))
                                        <span class="text-danger">{{ $errors->first('start_hour') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="end_hour">Hora de Fin:</label>
                                    <input type="time" id="end_hour" class="form-control"
                                        name="end_hour" value="{{ isset($availability) ? $availability->end_hour : old('end_hour') }}" required>
                                    @if ($errors->has('end_hour'))
                                        <span class="text-danger">{{ $errors->first('end_hour') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="time">Tiempo de Duración (minutos):</label>
                                    <input type="number" placeholder="Tiempo de Duración" id="time" class="form-control"
                                        name="time" value="{{ isset($availability) ? $availability->time : old('time') }}" required>
                                    @if ($errors->has('time'))
                                        <span class="text-danger">{{ $errors->first('time') }}</span>
                                    @endif
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <h5>&nbsp;</h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/locales/bootstrap-datepicker.es.min.js"></script>
@endsection