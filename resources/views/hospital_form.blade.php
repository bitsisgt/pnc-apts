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
            <h5>Perfil del Hospital: {{ isset($patient) ? $patient->name : 'Nuevo' }}</h5>
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
                                    <div class="form-group mb-3 col-6 column">
                                        <label class="font-weight-bold" for="name">Nombre:</label>
                                        <input type="text" placeholder="Nombre" id="name" class="form-control"
                                            name="name" value="{{ isset($patient) ? $patient->name : old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6 column">
                                        <label class="font-weight-bold" for="email">Correo electrónico:</label>
                                        <input type="email" placeholder="Correo electrónico" id="email" class="form-control"
                                            name="email" value="{{ isset($patient) ? $patient->email : old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="password">Contraseña:</label>
                                        <input type="password" placeholder="Contraseña" id="password" class="form-control"
                                            name="password" value="{{ isset($patient) ? $patient->password : old('password') }}" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="phone1">Teléfono 1:</label>
                                        <input type="text" placeholder="Teléfono 1" id="phone1" class="form-control"
                                            name="phone1" value="{{ isset($patient) ? $patient->phone1 : old('phone1') }}" required>
                                        @if ($errors->has('phone1'))
                                            <span class="text-danger">{{ $errors->first('phone1') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="phone2">Teléfono 2:</label>
                                        <input type="text" placeholder="Teléfono 2" id="phone2" class="form-control"
                                            name="phone2" value="{{ isset($patient) ? $patient->phone2 : old('phone2') }}">
                                        @if ($errors->has('phone2'))
                                            <span class="text-danger">{{ $errors->first('phone2') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="address">Dirección:</label>
                                        <input type="text" placeholder="Dirección" id="address" class="form-control"
                                            name="address" value="{{ isset($patient) ? $patient->address : old('address') }}" required>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="website">Sitio web:</label>
                                        <input type="text" placeholder="Sitio web" id="website" class="form-control"
                                            name="website" value="{{ isset($patient) ? $patient->website : old('website') }}" required>
                                        @if ($errors->has('website'))
                                            <span class="text-danger">{{ $errors->first('website') }}</span>
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