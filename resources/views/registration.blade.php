@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Registrar Usuario | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection

@section('content')
    <div class="container register-form bg-light">
        <h3 class="mt-2 text-center">Registro De Un Nuevo Usuario</h3>
        <hr class="border border-primary border-3">
        <p>
            Ingrese sus datos de usuario para entrar al servicio
        </p>
        @if ($errors->has('registration'))
            <div class="alert alert-danger" role="alert">
                <span>{{ $errors->first('registration') }}</span>
            </div>
        @endif
        <form action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div id="form-part-1">
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="type">Tipo de Registro:</label>
                    <select class="form-control form-select" id="type" name="type" aria-label="Tipo de registro"
                        autofocus required">
                        <option>Seleccione una categoría</option>
                        <option {{ ( old("type") == 'SISPE' ? "selected":"") }} value="SISPE">SISPE</option>
                        <option {{ ( old("type") == 'MINGOB' ? "selected":"") }} value="MINGOB">MINGOB</option>
                        <option {{ ( old("type") == 'ACADEMIA' ? "selected":"") }} value="ACADEMIA">ACADEMIA</option>
                        <option {{ ( old("type") == 'OTRO' ? "selected":"") }} value="OTRO">OTRO</option>
                    </select>
                    @if ($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="name">Nombre:</label>
                    <input type="text" placeholder="Nombre" id="name" class="form-control" name="name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3 collapse" id="nip-div">
                    <label class="font-weight-bold" for="nip">NIP:</label>
                    <input type="text" placeholder="NIP" id="nip" class="form-control" name="nip" value="{{ old('nip') }}">
                    @if ($errors->has('nip'))
                        <span class="text-danger">{{ $errors->first('nip') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="dpi">DPI:</label>
                    <input type="text" placeholder="DPI" id="dpi" class="form-control" name="dpi" value="{{ old('dpi') }}" required>
                    @if ($errors->has('dpi'))
                        <span class="text-danger">{{ $errors->first('dpi') }}</span>
                    @endif
                </div>
            </div>
            <div id="form-part-2">
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="email_address">Correo Electrónico:</label>
                    <input type="text" placeholder="Correo Electrónico" id="email_address" class="form-control"
                        name="email_address" required value="{{ old('email_address') }}">
                    @if ($errors->has('email_address'))
                        <span class="text-danger">{{ $errors->first('email_address') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="phone">Teléfono:</label>
                    <input type="text" placeholder="Teléfono" id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="password">Nueva Contraseña:</label>
                    <input type="password" placeholder="Nueva Contraseña" id="password" class="form-control"
                        name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold" for="repeat_password">Confirmar Contraseña:</label>
                    <input type="password" placeholder="Confirmar Contraseña" id="repeat_password" class="form-control"
                        name="repeat_password" required>
                    @if ($errors->has('repeat_password'))
                        <span class="text-danger">{{ $errors->first('repeat_password') }}</span>
                    @endif
                </div>
                <hr class="border border-secondary border-3">
                <div class="form-group group-buttons d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary col-4">Guardar</button>
                    <a href="{{ route('index') }}" class="btn btn-secondary col-4">Regresar</a>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('js')
<script>
    var select = document.getElementById("type");

    select.addEventListener("change", function() {
      if (select.value === "SISPE") {
        $('#nip-div').collapse("show");
      } else {
        $('#nip-div').collapse("hide");
      }
    });

    window.onload = function() {
        if (select.value === "SISPE") {
        $('#nip-div').collapse("show");
      } else {
        $('#nip-div').collapse("hide");
      }
    };
  </script>
@endsection
