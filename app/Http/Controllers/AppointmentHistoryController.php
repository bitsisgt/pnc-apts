<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AppointmentHistoryDataTable;

class AppointmentHistoryController extends Controller
{
    public function maintenance_appointment_history(AppointmentHistoryDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.appointment_history');
    }
}

