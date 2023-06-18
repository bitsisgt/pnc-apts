@extends('dashboard')
@section('title', 'Subdirección General De Salud Policial SISAP | Panel Principal de Pacientes | Servicio de Citas
    Médicas')

@section('content')
    <div class="card" style="width: 1200px">
        <div class="card-header d-flex justify-content-between">
            <h5>Historial de Citas</h5>
            <a href="{{ route('main') }}">Regresar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a class="btn btn-info text-light mx-2" href="#">
                                            <img src="./img/pendiente.png" alt="Pendiente" width="25">
                                            Pendiente
                                        </a>
                                    </div>
                                    <div class="mr-3">
                                        <a class="btn btn-success text-light mx-2" href="#">
                                            <img src="./img/confirmacion.png" alt="Terminado" width="25">
                                            Terminado
                                        </a>
                                    </div>
                                    <div class="mr-3">
                                        <a class="btn btn-danger text-light mx-2" href="#">
                                            <img src="./img/cancelar.png" alt="Cancelado" width="25">
                                            Cancelado
                                        </a>
                                    </div>
                                </div>
                                <h2 class="text-center">Historial de Citas</h2>
                                <div>
                                    <button class="btn btn-primary mr-2">Imprimir</button>
                                    <button class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Doctor</th>
                                        <th>Fecha de la cita</th>
                                        <th>Estados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Juan Sánchez</td>
                                        <td>Dr. Contreras</td>
                                        <td>2023-06-10</td>
                                        <td>
                                            <button class="btn btn-danger">Cancelar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Julian Cortéz</td>
                                        <td>Dr. Hernández</td>
                                        <td>2023-06-11</td>
                                        <td>
                                            <button class="btn btn-success mr-2">Terminado</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Bonilla</td>
                                        <td>Dra. Pasillas</td>
                                        <td>2023-06-12</td>
                                        <td>
                                            <button class="btn btn-danger">Cancelar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sara Contreras</td>
                                        <td>Dra. Castilla</td>
                                        <td>2023-06-13</td>
                                        <td>
                                            <!-- <a href="otra_pagina.html">
                                <img src="carnet.png" alt="Carnet" width="50">
                              </a> -->
                                            <button class="btn btn-danger">Cancelar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Roberto Mendoza</td>
                                        <td>Dra. Crúz</td>
                                        <td>2023-06-14</td>
                                        <td>
                                            <button class="btn btn-success mr-2">Terminado</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
