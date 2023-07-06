<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AppointmentManagementDataTable;

class AppointmentManagementController extends Controller
{
    public function maintenance_appointment_management(AppointmentManagementDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.appointment_management');
    }
}
