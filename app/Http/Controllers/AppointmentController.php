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
        $hospitals = Hospital::all();
        $specialities = Speciality::all();
        $doctors = Doctor::all();
        $patients = Patient::where('user_id', $request->user()->id)->get();
        $data = [
            'patients' => $patients,
            'hospitals' => $hospitals,
            'specialities' => $specialities,
            'doctors' => $doctors
        ];
        if ($patients->isEmpty()) {
            $data['error'] = '1';
            return view('appointment', $data);
        }

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
            $appointmens_day = Appointment::where('hospital_id', $hospital_id)->where('doctor_id', $doctor_id)->where('speciality_id', $speciality_id)->whereBetween('start_date', [$now->format('Y-m-d ') . ' 00:00:00', $now->format('Y-m-d ') . ' 23:59:59'])->where('status', 'ACTIVA')->get();
            $reserverd = $appointmens_day->count();
            $available = $total - $reserverd;
            if ($total > 0) {
                $event = [
                    "title" =>  $available . ' Disponible' . ($available <> 1 ? 's' : ''),
                    "start" => $now->format('Y-m-d'),
                    "color" => ($available > 1) ? '#007bff' : (($available <= 0) ? '#dc3545' : '#ffc107'),
                    "textColor" => $available == 1 ? '#343a40' : '#f8f9fa'
                ];
                array_push($events, $event);
            }
            $now = $now->addDay(1);
        }

        $data['events'] = $events;
        return view('appointment', $data);
    }

    public function available_hours(Request $request)
    {
        $doctor_id = $request->input('doctor_id');
        $speciality_id = $request->input('speciality_id');
        $hospital_id = $request->input('hospital_id');
        $day = $request->input('day');
        $date = Carbon::createFromFormat('Y-m-d', $day, 'America/Guatemala');
        $availabilities = Availability::where('hospital_id', $hospital_id)->where('doctor_id', $doctor_id)->where('speciality_id', $speciality_id)->where('day_of_week', $date->dayOfWeekIso)->get();
        $appointments = Appointment::where('hospital_id', $hospital_id)->where('doctor_id', $doctor_id)->where('speciality_id', $speciality_id)->whereBetween('start_date', [$date->format('Y-m-d ') . ' 00:00:00', $date->format('Y-m-d ') . ' 23:59:59'])->where('status', 'ACTIVA')->get();
        $filtered = $availabilities->filter(function ($a) use ($appointments) {
            foreach ($appointments as $appointement) {
                $start = Carbon::createFromTime(intval($a->start_hour), 0, 0, 'America/Guatemala');
                $end = Carbon::createFromTime(intval($a->end_hour), 0, 0, 'America/Guatemala');
                $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $appointement->start_date, 'America/Guatemala');
                $target = Carbon::createFromFormat('H:i:s', $carbon->format('H:i:s'), 'America/Guatemala');
                if ($target >= $start && $target <= $end) {
                    return false;
                }
            }
            return true;
        });
        return $filtered;
    }

    public function reserve(Request $request)
    {
        $av_id = $request->input('availability');
        $patient_id = $request->input('patient_ap');
        $availability = Availability::find($av_id);
        $date = $request->input('date_a');
        $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . intval($availability->start_hour) . ':00:00', 'America/Guatemala');
        $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . intval($availability->end_hour) . ':00:00', 'America/Guatemala');
        Appointment::create([
            'patient_id' => $patient_id,
            'doctor_id' => $availability->doctor_id,
            'hospital_id' => $availability->hospital_id,
            'speciality_id' => $availability->speciality_id,
            'status' => 'ACTIVA',
            'start_date' => $start_date,
            'end_date' => $end_date,
            'day_of_week' => $start_date->dayOfWeekIso
        ]);
        return redirect()->intended('main')->withSuccess('Cita reservada');
    }

    public function admin(Request $request)
    {
        $appointments = Appointment::whereHas('Patient', function ($p) use ($request) {
            $p->user_id = $request->user()->id;
        })->orderBy('start_date', 'desc')->get();
        return view('admin_appointments', ['appointments' => $appointments]);
    }

    public function show($id)
    {

        $appointment = Appointment::find($id);
        $patientName = $appointment->patient->name; // Suponiendo que la relación se llama "patient" y el campo "name" representa el nombre del paciente
        $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_date); // Convertir la fecha y hora en un objeto Carbon
    
        return view('appointment.show', [
            'appointment' => $appointment,
            'patientName' => $patientName,
            'startDateTime' => $startDateTime
        ]);
    }
}
