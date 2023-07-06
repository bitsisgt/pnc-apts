<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\InquiriesPatientDataTable;

class InquiriesPatientController extends Controller
{
    public function maintenance_inquiries_patients(InquiriesPatientDataTable $dataTable)
    {
        
        return $dataTable->render('maintenance.inquiries_patient');
    }
}
