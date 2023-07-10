<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class UserViewController extends Controller
{
    public function user_view()
{
    $patient = Patient::find(1);

        // Pasar los datos del paciente a la vista
        
    $profile = $patient->profile;
        return view('user-view', ['patient' => $patient,'profile' => $profile]);
}
}
