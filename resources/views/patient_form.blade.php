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
            <h5>Perfil del Paciente: {{ isset($patient) ? $patient->name : 'Nuevo' }}</h5>
            <a href="{{ route('main') }}">Regresar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active show" id="v-pills-personal-tab" data-toggle="pill"
                            href="#v-pills-personal" role="tab" aria-controls="v-pills-personal"
                            aria-selected="true">Datos Personales</a>
                    </div> -->
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-personal" role="tabpanel"
                            aria-labelledby="v-pills-personal-tab">
                            <form action="{{ url('patient/'.(isset($patient) && $patient->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="row d-flex justify-content-between">
                                    <h5>Datos Personales</h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                                @csrf
                                <input type="text" id="id" class="form-control"
                                    name="id" value="{{ isset($patient) ? $patient->id : '' }}" hidden>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="name">Nombre:</label>
                                        <input type="text" placeholder="Nombre" id="name" class="form-control"
                                            name="name" value="{{ isset($patient) ? $patient->name : old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="user_id">ID de Usuario:</label>
                                        <input type="text" placeholder="ID de Usuario" id="user_id" class="form-control"
                                            name="user_id" value="{{ isset($patient) ? $patient->user_id : old('user_id') }}" required>
                                        @if ($errors->has('user_id'))
                                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="profile_id">ID de Perfil:</label>
                                        <input type="text" placeholder="ID de Perfil" id="profile_id" class="form-control"
                                            name="profile_id" value="{{ isset($patient) ? $patient->profile_id : old('profile_id') }}" required>
                                        @if ($errors->has('profile_id'))
                                            <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="type">Tipo:</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="masculino" {{ isset($patient) && $patient->type === 'masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="femenino" {{ isset($patient) && $patient->type === 'femenino' ? 'selected' : '' }}>Femenino</option>
                                            <option value="otros" {{ isset($patient) && $patient->type === 'otros' ? 'selected' : '' }}>Otros</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="last_visit">Última Visita:</label>
                                        <input type="text" placeholder="Última Visita" id="last_visit" class="form-control"
                                            name="last_visit" value="{{ isset($patient) ? $patient->last_visit : old('last_visit') }}" required>
                                        @if ($errors->has('last_visit'))
                                            <span class="text-danger">{{ $errors->first('last_visit') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="id_number">Número de Identificación:</label>
                                        <input type="text" placeholder="Número de Identificación" id="id_number" class="form-control"
                                            name="id_number" value="{{ isset($patient) ? $patient->id_number : old('id_number') }}" required>
                                        @if ($errors->has('id_number'))
                                            <span class="text-danger">{{ $errors->first('id_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="medical_number">Número Médico:</label>
                                        <input type="text" placeholder="Número Médico" id="medical_number" class="form-control"
                                            name="medical_number" value="{{ isset($patient) ? $patient->medical_number : old('medical_number') }}" required>
                                        @if ($errors->has('medical_number'))
                                            <span class="text-danger">{{ $errors->first('medical_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="emergency_contact">Contacto de Emergencia:</label>
                                        <input type="text" placeholder="Contacto de Emergencia" id="emergency_contact" class="form-control"
                                            name="emergency_contact" value="{{ isset($patient) ? $patient->emergency_contact : old('emergency_contact') }}" required>
                                        @if ($errors->has('emergency_contact'))
                                            <span class="text-danger">{{ $errors->first('emergency_contact') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="recurrence">Recurrencia:</label>
                                        <input type="text" placeholder="Recurrencia" id="recurrence" class="form-control"
                                            name="recurrence" value="{{ isset($patient) ? $patient->recurrence : old('recurrence') }}" required>
                                        @if ($errors->has('recurrence'))
                                            <span class="text-danger">{{ $errors->first('recurrence') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="prescriptions_count">Cantidad de Prescripciones:</label>
                                        <input type="text" placeholder="Cantidad de Prescripciones" id="prescriptions_count" class="form-control"
                                            name="prescriptions_count" value="{{ isset($patient) ? $patient->prescriptions_count : old('prescriptions_count') }}" required>
                                        @if ($errors->has('prescriptions_count'))
                                            <span class="text-danger">{{ $errors->first('prescriptions_count') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="allergies">Alergias:</label>
                                        <textarea id="allergies" class="form-control" name="allergies" rows="3" required>{{ isset($patient) ? $patient->allergies : old('allergies') }}</textarea>
                                        @if ($errors->has('allergies'))
                                            <span class="text-danger">{{ $errors->first('allergies') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="qr">Código QR:</label>
                                        <input type="text" placeholder="Código QR" id="qr" class="form-control"
                                            name="qr" value="{{ isset($patient) ? $patient->qr : old('qr') }}" required>
                                        @if ($errors->has('qr'))
                                            <span class="text-danger">{{ $errors->first('qr') }}</span>
                                        @endif
                                    </div>
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