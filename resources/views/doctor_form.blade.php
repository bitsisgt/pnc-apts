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
            <h5>Perfil del Doctor: {{ isset($doctor) ? $doctor->name : 'Nuevo' }}</h5>
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
                            <form action="{{ url('doctor/'.(isset($doctor) && $doctor->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="row d-flex justify-content-between">
                                    <h5>Datos Personales</h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                                @csrf
                                <input type="text" id="id" class="form-control"
                                    name="id" value="{{ isset($doctor) ? $doctor->id : '' }}" hidden>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="name">Nombre:</label>
                                    <input type="text" placeholder="Nombre" id="name" class="form-control"
                                        name="name" value="{{ isset($doctor) ? $doctor->name : old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="profile_id">ID de Perfil:</label>
                                    <input type="text" placeholder="ID de Perfil" id="profile_id" class="form-control"
                                        name="profile_id" value="{{ isset($doctor) ? $doctor->profile_id : old('profile_id') }}" required>
                                    @if ($errors->has('profile_id'))
                                        <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="user_id">ID de Usuario:</label>
                                    <input type="text" placeholder="ID de Usuario" id="user_id" class="form-control"
                                        name="user_id" value="{{ isset($doctor) ? $doctor->user_id : old('user_id') }}" required>
                                    @if ($errors->has('user_id'))
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    @endif
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