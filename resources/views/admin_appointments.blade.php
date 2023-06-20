@extends('dashboard')
@section('title',
    'Subdirección General De Salud Policial SISAP | Historial de Citas | Servicio de Citas
    Médicas')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="card" style="width: 1200px">
        <div class="card-header d-flex justify-content-between">
            <h5>Historial de Citas</h5>
            <a href="{{ route('main') }}">Regresar</a>
        </div>
        <div class="card-body">
            <a href="{{ route('appointment') }}" class="btn btn-primary mb-2"><i class="fa fa-calendar"></i>&nbsp;Agendar</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Doctor</th>
                        <th>Hospital</th>
                        <th>Fecha de la cita</th>
                        <th>Estado</th>
                        <th>Cancelar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $ap)
                        <tr>
                            <td>{{ $ap->patient->name }}</td>
                            <td>{{ $ap->doctor->name }}</td>
                            <td>{{ $ap->hospital->name }}</td>
                            <td>{{ $ap->start_date }}</td>
                            <td><span
                                    class="badge badge-pill badge-{{ $ap->status == 'ACTIVA' ? 'primary' : 'secondary' }}">{{ $ap->status }}</span>
                            </td>
                            <td>
                                @if ($ap->status == 'ACTIVA')
                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
