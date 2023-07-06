<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\HospitalsDataTable;

class HospitalsController extends Controller
{
    public function maintenance_hospitals(HospitalsDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.hospitals');
    }
}
