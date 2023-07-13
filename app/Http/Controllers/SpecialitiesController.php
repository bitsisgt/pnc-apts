<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SpecialitiesDataTable;

class SpecialitiesController extends Controller
{
    public function maintenance_specialities(SpecialitiesDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.specialities');
    }

    public function create()
    {
        return view('specialities_form');
    }
}
