@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Administración de Pacientes | Servicio de Citas Médicas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
      <div class="card mb-8" style="width: 1200px; margin-bottom: 80px">
        <div class="card-header d-flex justify-content-between">
            <h5>Administración de Pacientes:</h5>
            <a href="{{ route('main') }}">Regresar</a>
        </div>
        <div class="card-body">
            <a href="{{ route('profile.patient') }}" class="btn btn-primary mb-2"><i class="fa fa-plus"></i>&nbsp;Crear</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DPI</th>
                        <th>Carnet</th>
                        <th>Número Expediente</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->profile->dpi }}</td>
                        <td>{{ $patient->id_number }}</td>
                        <td>{{ $patient->medical_number }}</td>
                        <td>
                            <a href="{{ route('profile.patient', $patient->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('patient.show', $patient->id) }}" class="btn btn-success"><i class="fa fa-id-card"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')

@endsection
