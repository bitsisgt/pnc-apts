<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Availability;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Speciality;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::where('user_id', $request->user()->id)->get();
        if ($patients->isEmpty()) {
            return view('appointment', ['error' => '1']);
        }
        $hospitals = Hospital::all();
        $specialities = Speciality::all();
        $doctors = Doctor::all();
        $data = [
            'patients' => $patients,
            'hospitals' => $hospitals,
            'specialities' => $specialities,
            'doctors' => $doctors
        ];

        $doctor_id = $request->input('doctor_id');
        $speciality_id = $request->input('speciality_id');
        $hospital_id = $request->input('hospital_id');
        if (!isset($doctor_id) && !isset($speciality_id) && !isset($hospital_id))
            return view('appointment', $data);

        $now = Carbon::now('America/Guatemala');
        $availabilities = Availability::where('hospital_id', $hospital_id)->where('doctor_id', $doctor_id)->where('speciality_id', $speciality_id)->get();
        $events = [];
        for ($i = 0; $i < 30; $i++) {
            $dayOfWeek = $now->dayOfWeekIso;
            $total = ($availabilities->filter(function ($a) use ($dayOfWeek) {
                return $a->day_of_week == $dayOfWeek;
            }))->count();
            $appointmens_day = Appointment::where('hospital_id', $hospital_id)->where('doctor_id', $doctor_id)->where('speciality_id', $speciality_id)->whereBetween('start_date', [$now->format('Y-m-d ') . ' 00:00:00', $now->format('Y-m-d ') . ' 23:59:59'])->get();
            $reserverd = $appointmens_day->count();
            $available = $total - $reserverd;
            if ($total > 0) {
                $event = [
                    "title" => $available . ' Disponible' . ($available <> 1 ? 's' : ''),
                    "start" => $now->format('Y-m-d'),
                    "color" => ($available > 1 ? '#007bff' : $available <= 0) ? '#dc3545' : '#ffc107',
                    "textColor" => $available == 1 ? '#343a40' : '#f8f9fa'
                ];
                array_push($events, $event);
            }
            $now = $now->addDay(1);
        }

        $data['events'] = $events;
        return view('appointment', $data);
    }

    public function admin()
    {
        return view('admin_appointments');
    }
}
