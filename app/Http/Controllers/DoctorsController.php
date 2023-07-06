<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DoctorsDataTable;

class DoctorsController extends Controller
{
    public function maintenance_doctors(DoctorsDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.doctors');
    }
}
