<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AppointmentManagementDataTable;

use App\Models\Appointment;

class AppointmentManagementController extends Controller
{
    public function maintenance_appointment_management(AppointmentManagementDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.appointment_management');
    }

    public function create()
    {
        return view('appointment_management_form');
    }

    public function edit($id)
    {
        // Obtén el registro de la cita médica según el ID
        $appointment = Appointment::findOrFail($id);
        
        // Puedes pasar los datos a una vista para mostrar el formulario de edición
        return view('appointment_management_form', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        // // Obtén el registro de la cita médica según el ID
        // $appointment = Appointment::findOrFail($id);
        
        // // Actualiza los datos del paciente con los valores proporcionados en el formulario
        // $appointment->patient_name = $request->input('patient_id');
        // // Actualiza otros campos según sea necesario...
        
        // // Guarda los cambios en la base de datos
        // $appointment->save();
        
        // // Puedes redirigir a una página de éxito o mostrar un mensaje de confirmación
        // return redirect()->route('appointment.management')->with('success', 'Cita médica actualizada exitosamente.');

        $appointment = Appointment::findOrFail($id);
        
        // Actualiza los datos del paciente con los valores proporcionados en el formulario
        $appointment->patient_id = $request->input('patient_id');
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->hospital_id = $request->input('hospital_id');
        $appointment->speciality_id = $request->input('speciality_id');
        $appointment->status = $request->input('status');
        $appointment->start_date = $request->input('start_date');
        $appointment->end_date = $request->input('end_date');
        $appointment->day_of_week = $request->input('day_of_week');
        
        // Guarda los cambios en la base de datos
        $appointment->save();

        return redirect()->route('appointment.management')->with('success', 'Cita médica actualizada exitosamente.');
    }
}
