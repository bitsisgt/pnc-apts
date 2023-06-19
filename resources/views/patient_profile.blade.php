@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Perfil de Paciente | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="card mb-8" style="width: 1200px; margin-bottom: 80px">
        <div class="card-header d-flex justify-content-between">
            <h5>Perfil de Paciente: {{ isset($patient) ? $patient->name : 'Nuevo' }}</h5>
            <a href="{{ route('main') }}">Regresar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active show" id="v-pills-personal-tab" data-toggle="pill"
                            href="#v-pills-personal" role="tab" aria-controls="v-pills-personal"
                            aria-selected="true">Datos Personales</a>
                        <a class="nav-link" id="v-pills-medical-tab" data-toggle="pill" href="#v-pills-medical"
                            role="tab" aria-controls="v-pills-medical" aria-selected="false">Perfil Médico</a>
                        @if($type == 'SISPE')
                            <a class="nav-link" id="v-pills-sispe-tab" data-toggle="pill" href="#v-pills-sispe" role="tab"
                            aria-controls="v-pills-sispe" aria-selected="false">SISPE</a>
                        @endif
                        @if($type == 'MINGOB')
                        <a class="nav-link" id="v-pills-mingob-tab" data-toggle="pill" href="#v-pills-mingob" role="tab"
                            aria-controls="v-pills-mingob" aria-selected="false">MINGOB</a>
                        @endif
                        @if($type == 'ACADEMIA')
                        <a class="nav-link" id="v-pills-sged-tab" data-toggle="pill" href="#v-pills-sged" role="tab"
                            aria-controls="v-pills-sged" aria-selected="false">Academia PNC</a>
                        @endif
                    </div>
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
                                        <label class="font-weight-bold" for="first_name">Nombres:</label>
                                        <input type="text" placeholder="Nombres" id="first_name" class="form-control"
                                            name="first_name" value="{{ isset($patient) ? $patient->profile->first_name : old('first_name') }}" required>
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6 column">
                                        <label class="font-weight-bold" for="last_name">Apellidos:</label>
                                        <input type="text" placeholder="Apellidos" id="last_name" class="form-control"
                                            name="last_name" value="{{ isset($patient) ? $patient->profile->last_name : old('last_name') }}">
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="first_name">Apellido de Casada:</label>
                                        <input type="text" placeholder="Apellido de Casada" id="married_name"
                                            class="form-control" name="married_name" value="{{ isset($patient) ? $patient->profile->married_name : old('married_name') }}">
                                        @if ($errors->has('married_name'))
                                            <span class="text-danger">{{ $errors->first('married_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="dpi">DPI:</label>
                                        <input type="text" placeholder="DPI" id="dpi" class="form-control"
                                            name="dpi" value="{{ isset($patient) ? $patient->profile->dpi : old('dpi') }}">
                                        @if ($errors->has('dpi'))
                                            <span class="text-danger">{{ $errors->first('dpi') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="birth_date">Fecha de Nacimiento:</label>
                                        <input type="text" placeholder="Fecha de Nacimiento" id="birth_date"
                                            class="form-control" name="birth_date" value="{{ isset($patient) ? $patient->profile->birth_date : old('birth_date') }}">
                                        @if ($errors->has('birth_date'))
                                            <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="birth_place">Lugar de Nacimiento:</label>
                                        <input type="text" placeholder="Lugar de Nacimiento" id="birth_place"
                                            class="form-control" name="birth_place" value="{{ isset($patient) ? $patient->profile->birth_place : old('birth_place') }}">
                                        @if ($errors->has('birth_place'))
                                            <span class="text-danger">{{ $errors->first('birth_place') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="nationality">Nacionalidad:</label>
                                        <input type="text" placeholder="Nacionalidad" id="nationality"
                                            class="form-control" name="nationality" value="{{ isset($patient) ? $patient->profile->nationality : old('nationality') }}">
                                        @if ($errors->has('nationality'))
                                            <span class="text-danger">{{ $errors->first('nationality') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="address">Dirección:</label>
                                        <input type="text" placeholder="Dirección" id="address"
                                            class="form-control" name="address" value="{{ isset($patient) ? $patient->profile->address : old('address') }}">
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="gender">Género:</label>
                                        <select class="form-control form-select" id="gender" name="gender"
                                            aria-label="Género" autofocus required">
                                            <option>Seleccione un género</option>
                                            <option {{ (isset($patient) ? $patient->profile->gender : old('gender')) == 'M' ? 'selected' : '' }} value="M">Masculino
                                            </option>
                                            <option {{ (isset($patient) ? $patient->profile->gender : old('gender')) == 'F' ? 'selected' : '' }} value="F">Femenino
                                            </option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="marital_status">Estado Civil:</label>
                                        <select class="form-control form-select" id="marital_status"
                                            name="marital_status" aria-label="Estado Civil" autofocus required">
                                            <option>Seleccione un estado civil</option>
                                            <option {{ (isset($patient) ? $patient->profile->marital_status : old('marital_status')) == 'Soltero' ? 'selected' : '' }}
                                                value="Soltero">Soltero</option>
                                            <option {{ (isset($patient) ? $patient->profile->marital_status : old('marital_status')) == 'Casado' ? 'selected' : '' }}
                                                value="Casado">Casado</option>
                                            <option {{ (isset($patient) ? $patient->profile->marital_status : old('marital_status')) == 'Divorciado' ? 'selected' : '' }}
                                                value="Divorciado">Divorciado</option>
                                            <option {{ (isset($patient) ? $patient->profile->marital_status : old('marital_status')) == 'Viudo' ? 'selected' : '' }}
                                                value="Viudo">Viudo</option>
                                            <option {{ (isset($patient) ? $patient->profile->marital_status : old('marital_status')) == 'Union' ? 'selected' : '' }}
                                                value="Union">Union</option>
                                        </select>
                                        @if ($errors->has('marital_status'))
                                            <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="child_count">Cantidad de Hijos:</label>
                                        <input type="number" step="1" placeholder="Cantidad de Hijos"
                                            id="child_count" class="form-control" name="child_count"
                                            value="{{ isset($patient) ? $patient->profile->child_count : old('child_count') }}">
                                        @if ($errors->has('child_count'))
                                            <span class="text-danger">{{ $errors->first('child_count') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="ethnicity">Étnia:</label>
                                        <select class="form-control form-select" id="ethnicity" name="ethnicity"
                                            aria-label="Étnia" autofocus required">
                                            <option>Seleccione una étnia</option>
                                            <option {{ (isset($patient) ? $patient->profile->ethnicity : old('ethnicity')) == 'Ladino' ? 'selected' : '' }} value="Ladino">
                                                Ladino</option>
                                            <option {{ (isset($patient) ? $patient->profile->ethnicity : old('ethnicity')) == 'Maya' ? 'selected' : '' }} value="Maya">Maya
                                            </option>
                                            <option {{ (isset($patient) ? $patient->profile->ethnicity : old('ethnicity')) == 'Xinca' ? 'selected' : '' }} value="Xinca">
                                                Xinca</option>
                                            <option {{ (isset($patient) ? $patient->profile->ethnicity : old('ethnicity')) == 'Garifuna' ? 'selected' : '' }}
                                                value="Garifuna">Garifuna</option>
                                        </select>
                                        @if ($errors->has('ethnicity'))
                                            <span class="text-danger">{{ $errors->first('ethnicity') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="child_names">Nombres de los hijos:</label>
                                        <input type="text" placeholder="Cantidad de Hijos" id="child_names"
                                            class="form-control" name="child_names" value="{{ isset($patient) ? $patient->profile->child_names : old('child_names') }}">
                                        @if ($errors->has('child_names'))
                                            <span class="text-danger">{{ $errors->first('child_names') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="father_name">Nombre del Padre:</label>
                                        <input type="text" placeholder="Nombre del Padre" id="father_name"
                                            class="form-control" name="father_name" value="{{ isset($patient) ? $patient->profile->father_name : old('father_name') }}">
                                        @if ($errors->has('father_name'))
                                            <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="mother_name">Nombres de la Madre:</label>
                                        <input type="text" placeholder="Nombres de la Madre" id="mother_name"
                                            class="form-control" name="mother_name" value="{{ isset($patient) ? $patient->profile->mother_name : old('mother_name') }}">
                                        @if ($errors->has('mother_name'))
                                            <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="photo">Foto:</label>
                                        <div class="input-group mb-3">
                                        <input class="form-control" type="file" id="photo" name="phot"
                                            onchange="preview()">
                                            <button onclick="clearImage()" class="btn btn-danger" id="delete-button" disabled><i class="fa fa-trash"></i></i></button>
                                            </div>
                                        <img id="frame" src="{{ (isset($patient) && isset($patient->profile->photo)) ? $patient->profile->photo : asset('/img/usuario.png') }}" class="img-thumbnail" alt="user-photo" />
                                        @if ($errors->has('photo'))
                                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-medical" role="tabpanel"
                            aria-labelledby="v-pills-medical-tab">
                            <form action="{{ url('patient/'.(isset($patient) && $patient->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="row d-flex justify-content-between">
                                    <h5>Perfil Médico</h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                                @csrf
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
                                        <label class="font-weight-bold" for="id_number">Carnet:</label>
                                        <input type="text" placeholder="Carnet" id="id_number" class="form-control"
                                            name="id_number" value="{{ isset($patient) ? $patient->id_number : old('id_number') }}">
                                        @if ($errors->has('id_number'))
                                            <span class="text-danger">{{ $errors->first('id_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="medical_number">Número Expediente:</label>
                                        <input type="text" placeholder="Número Expediente" id="medical_number"
                                            class="form-control" name="medical_number" value="{{ isset($patient) ? $patient->medical_number : old('medical_number') }}">
                                        @if ($errors->has('medical_number'))
                                            <span class="text-danger">{{ $errors->first('medical_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="emergency_contact">Contacto de Emergencia:</label>
                                        <input type="text" placeholder="Contacto de Emergencia" id="emergency_contact" class="form-control"
                                            name="emergency_contact" value="{{ isset($patient) ? $patient->emergency_contact : old('emergency_contact') }}">
                                        @if ($errors->has('emergency_contact'))
                                            <span class="text-danger">{{ $errors->first('emergency_contact') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-12">
                                        <label class="font-weight-bold" for="allergies">Alergias:</label>
                                        <input type="text" placeholder="Alergias" id="allergies"
                                            class="form-control" name="allergies" value="{{ isset($patient) ? $patient->allergies : old('allergies') }}">
                                        @if ($errors->has('allergies'))
                                            <span class="text-danger">{{ $errors->first('allergies') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-sispe" role="tabpanel"
                            aria-labelledby="v-pills-sispe-tab">
                            <form action="{{ url('patient/'.(isset($patient) && $patient->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="row d-flex justify-content-between">
                                    <h5>Datos SISPE</h5></h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_start_date">Fecha de Alta:</label>
                                        <input type="text" placeholder="Fecha de Alta" id="sispe_start_date"
                                            class="form-control" name="sispe_start_date" value="{{ isset($patient) ? $patient->profile->sispe_start_date : old('sispe_start_date') }}">
                                        @if ($errors->has('sispe_start_date'))
                                            <span class="text-danger">{{ $errors->first('sispe_start_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_unit">Unidad de Servicio:</label>
                                        <input type="text" placeholder="Unidad de Servicio" id="sispe_unit" class="form-control"
                                            name="sispe_unit" value="{{ isset($patient) ? $patient->profile->sispe_unit : old('sispe_unit') }}">
                                        @if ($errors->has('sispe_unit'))
                                            <span class="text-danger">{{ $errors->first('sispe_unit') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_place">Lugar de Servicio:</label>
                                        <input type="text" placeholder="Lugar de Servicio" id="sispe_place"
                                            class="form-control" name="sispe_place" value="{{ isset($patient) ? $patient->profile->sispe_place : old('sispe_place') }}">
                                        @if ($errors->has('sispe_place'))
                                            <span class="text-danger">{{ $errors->first('sispe_place') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_nominal_position">Puesto Nominal:</label>
                                        <input type="text" placeholder="Puesto Nominal" id="sispe_nominal_position" class="form-control"
                                            name="sispe_nominal_position" value="{{ isset($patient) ? $patient->profile->sispe_nominal_position : old('sispe_nominal_position') }}">
                                        @if ($errors->has('sispe_nominal_position'))
                                            <span class="text-danger">{{ $errors->first('sispe_nominal_position') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_functional_position">Puesto Funcional:</label>
                                        <input type="text" placeholder="Puesto Funcional" id="sispe_functional_position"
                                            class="form-control" name="sispe_functional_position" value="{{ isset($patient) ? $patient->profile->sispe_functional_position : old('sispe_functional_position') }}">
                                        @if ($errors->has('sispe_functional_position'))
                                            <span class="text-danger">{{ $errors->first('sispe_functional_position') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_rank">Grado:</label>
                                        <input type="text" placeholder="Grado" id="sispe_rank" class="form-control"
                                            name="sispe_rank" value="{{ isset($patient) ? $patient->profile->sispe_rank : old('sispe_rank') }}">
                                        @if ($errors->has('sispe_rank'))
                                            <span class="text-danger">{{ $errors->first('sispe_rank') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_status">Situación:</label>
                                        <input type="text" placeholder="Situación" id="sispe_status"
                                            class="form-control" name="sispe_status" value="{{ isset($patient) ? $patient->profile->sispe_status : old('sispe_status') }}">
                                        @if ($errors->has('sispe_status'))
                                            <span class="text-danger">{{ $errors->first('sispe_status') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="sispe_end_date">Fecha de Baja:</label>
                                        <input type="text" placeholder="Fecha de Baja" id="sispe_end_date"
                                            class="form-control" name="sispe_start_date" value="{{ isset($patient) ? $patient->profile->sispe_end_date : old('sispe_end_date') }}">
                                        @if ($errors->has('sispe_end_date'))
                                            <span class="text-danger">{{ $errors->first('sispe_end_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-mingob" role="tabpanel"
                            aria-labelledby="v-pills-settings-mingob">
                            <form action="{{ url('patient/'.(isset($patient) && $patient->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="row d-flex justify-content-between">
                                    <h5>Datos MINGOB</h5></h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="mingob_start_date">Fecha de Inicio Labores:</label>
                                        <input type="text" placeholder="Fecha de Inicio Labores" id="mingob_start_date"
                                            class="form-control" name="mingob_start_date" value="{{ isset($patient) ? $patient->profile->mingob_start_date : old('mingob_start_date') }}">
                                        @if ($errors->has('mingob_start_date'))
                                            <span class="text-danger">{{ $errors->first('mingob_start_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="mingob_unit">Unidad Departamento o Sección:</label>
                                        <input type="text" placeholder="Unidad Departamento o Sección" id="mingob_unit" class="form-control"
                                            name="mingob_unit" value="{{ isset($patient) ? $patient->profile->mingob_unit : old('mingob_unit') }}">
                                        @if ($errors->has('mingob_unit'))
                                            <span class="text-danger">{{ $errors->first('mingob_unit') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="mingob_budget_line">Renglón Presupuestario:</label>
                                        <input type="text" placeholder="Renglón Presupuestario" id="mingob_budget_line"
                                            class="form-control" name="mingob_budget_line" value="{{ isset($patient) ? $patient->profile->mingob_budget_line : old('mingob_budget_line') }}">
                                        @if ($errors->has('mingob_budget_line'))
                                            <span class="text-danger">{{ $errors->first('mingob_budget_line') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="mingob_nominal_position">Puesto Nominal:</label>
                                        <input type="text" placeholder="Puesto Nominal" id="mingob_nominal_position" class="form-control"
                                            name="mingob_nominal_position" value="{{ isset($patient) ? $patient->profile->mingob_nominal_position : old('mingob_nominal_position') }}">
                                        @if ($errors->has('mingob_nominal_position'))
                                            <span class="text-danger">{{ $errors->first('mingob_nominal_position') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="mingob_functional_position">Puesto Funcional:</label>
                                        <input type="text" placeholder="Puesto Funcional" id="mingob_functional_position"
                                            class="form-control" name="mingob_functional_position" value="{{ isset($patient) ? $patient->profile->mingob_functional_position : old('mingob_functional_position') }}">
                                        @if ($errors->has('mingob_functional_position'))
                                            <span class="text-danger">{{ $errors->first('mingob_functional_position') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-sged" role="tabpanel" aria-labelledby="v-pills-sged-tab">
                            <form action="{{ url('patient/'.(isset($patient) && $patient->id!==null ? 'update' : 'profile')) }}" method="POST">
                                <div class="row d-flex justify-content-between">
                                    <h5>Datos Academia PNC</h5></h5>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Guardar</button>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="academy_start_date">Fecha de Inicio Curso:</label>
                                        <input type="text" placeholder="Fecha de Inicio Curso" id="academy_start_date"
                                            class="form-control" name="academy_start_date" value="{{ isset($patient) ? $patient->profile->academy_start_date : old('academy_start_date') }}">
                                        @if ($errors->has('academy_start_date'))
                                            <span class="text-danger">{{ $errors->first('academy_start_date') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <label class="font-weight-bold" for="academy_end_date">Fecha de Finalización Curso:</label>
                                        <input type="text" placeholder="Fecha de Finalización Curso" id="academy_end_date"
                                            class="form-control" name="academy_end_date" value="{{ isset($patient) ? $patient->profile->academy_end_date : old('academy_end_date') }}">
                                        @if ($errors->has('academy_end_date'))
                                            <span class="text-danger">{{ $errors->first('academy_end_date') }}</span>
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
    <script>
        $('#birth_date').datepicker({
            language: "es"
        });
        $('#sispe_start_date').datepicker({
            language: "es"
        });
        $('#sispe_end_date').datepicker({
            language: "es"
        });
        $('#mingob_start_date').datepicker({
            language: "es"
        });
        $('#academy_start_date').datepicker({
            language: "es"
        });
        $('#academy_end_date').datepicker({
            language: "es"
        });



        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
            $('#delete-button').prop('disabled', false);
        }

        function clearImage() {
            document.getElementById('photo').value = null;
            frame.src = "/img/usuario.png";
            $('#delete-button').prop('disabled', true);
        }
    </script>
@endsection
