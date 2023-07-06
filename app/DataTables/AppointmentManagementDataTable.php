<?php

namespace App\DataTables;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Speciality;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppointmentManagementDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'appointment.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    // public function query(Appointment $model): QueryBuilder
    // {
    //     return $model->newQuery();
    // }

    public function query(Appointment $model): QueryBuilder
    {
        return $model->newQuery()
        ->join('patients', 'patients.id', '=', 'appointments.patient_id')
            ->join('doctors', 'doctors.id', '=', 'appointments.doctor_id')
            ->join('hospitals', 'hospitals.id', '=', 'appointments.hospital_id')
            // ->join('specialities', 'specialities.id', '=', 'doctors.speciality_id')
            // ->select('appointments.*', 'patients.name as patient_name', 'doctors.name as doctor_name', 'hospitals.name as hospital_name', 'specialities.name as speciality_name');
            ->select('appointments.*', 'patients.name as patient_name', 'doctors.name as doctor_name', 'hospitals.name as hospital_name');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('appointment-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add')->text('Nuevo'),
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
                //   ->addClass('text-center'),
            // Column::make('patient_id')->title('ID de Paciente'),
            Column::make('patient_name')->title('Nombre paciente'),
            // Column::make('doctor_id')->title('ID de Doctor'),
            Column::make('doctor_name')->title('Nombre Doctor'),
            // Column::make('hospital_id')->title('ID de Hospital'),
            Column::make('hospital_name')->title('Nombre Hospital'),
            Column::make('speciality_id')->title('ID de Especialidad'),
            // Column::make('speciality_name')->title('Nombre Especialidad'),
            Column::make('status')->title('Estatus'),
            Column::make('start_date')->title('Fecha de Inicio'),
            Column::make('end_date')->title('Fecha de Finalización'),
            Column::make('day_of_week')->title('Día de la Semana'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Appointment_' . date('YmdHis');
    }
}
