<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AvailabilityDataTable;

class AvailabilityController extends Controller
{
    public function maintenance_availability(AvailabilityDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.availability');
    }
}
