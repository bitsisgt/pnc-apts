<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PatientsDataTable;


class PatientsController extends Controller
{
    public function maintenance_patients(PatientsDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.patients');
    }

    public function create()
    {
        return view('patient_form');
    }
}
