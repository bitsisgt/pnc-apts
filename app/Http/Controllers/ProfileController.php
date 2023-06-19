<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function patient_profile(Request $request, $id=null)
    {
        if (isset($id)) {
            $patient = Patient::find($id);
            return view('patient_profile', ['patient' => $patient, 'type' => $patient->type]);
        } else {
            return view('patient_profile', ['type' => 'OTRO']);
        }
    }

    public function user_patient_profile(Request $request)
    {
        if($this->check_if_user_has_profile($request->user())) {
            return redirect()->intended('main')->withError('Este usuario ya tiene un perfil asignado');
        }
        $patient = new \StdClass();
        $patient->name = $request->user()->name;
        return view('patient_profile', ['patient' => $patient, 'type' => $request->user()->type]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'gender' => 'required|in:M,F',
            'child_count' => 'required|gte:0'
        ]);
        $profile = new Profile();
        $profile->fill($request->all());
        $id = $profile->save();

        $patient = new Patient();
        $patient->fill($request->all());
        if(!isset($patient->name)) {
            $patient->name = $request->user()->name;
        }
        if(!isset($patient->user_id)) {
            $patient->user_id = $request->user()->id;
        }
        $patient->profile_id = $profile->id;
        $patient->save();
        return redirect()->intended('/patient/profile/'.$patient->id)->withSuccess('Perfil Médico creado correctamente');
    }

    public function check_if_user_has_profile($user) {
        $patient = Patient::where('user_id', $user->id)->get();
        return isset($patient);
    }

    public function update(Request $request)
    {
        if(!$request->has('id')) {
            return redirect()->intended('/patient/profile/')->withError('ID del Paciente no encontrado');
        }

        $patient = Patient::find($request->input('id'));
        $patient->fill($request->all());
        $patient->save();

        $profile = Profile::find($patient->profile->id);
        $profile->fill($request->all());
        $profile->save();
        return redirect()->intended('patient/profile/'.$patient->id)->withSuccess('Perfil Médico actualizado correctamente');
    }

    public function patient_admin(Request $request) {
        $data = Patient::where('user_id', $request->user()->id)->get();
        return view('patients_admin', ['patients' => $data]);
    }
}
