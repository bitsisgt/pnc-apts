<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return Redirect('main');
        }
        return view('welcome');
    }

    public function login()
    {
        if (Auth::check()) {
            return Redirect('main');
        }
        return view('login');
    }

    public function main(Request $request)
    {
        $data = Patient::where('user_id', $request->user()->id)->get();
        $patientId = $data->first()->id;

        return view('patients_dashboard', ['patientId' => $patientId]);
    }

    public function registration()
    {
        if (Auth::check()) {
            return Redirect('main');
        }

        return view('registration');
    }

    public function signOut()
    {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $validator = Validator::make($request->all(), [
            'email' => 'email'
        ]);

        $login = false;

        if ($validator->fails()) {
            $login = Auth::attempt(['nip' => $request->input('email'), 'password' =>  $request->input('password')]);
        } else {
            $credentials = $request->only('email', 'password');
            $login = Auth::attempt($credentials);
        }

        if ($login) {
            return redirect()->intended('main');
        }
        return redirect("login")->withErrors(['login' => 'Las credenciales no coinciden, por favor intente de nuevo']);
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'type' => 'required|in:SISPE,MINGOB,ACADEMIA,OTRO',
            'nip' => 'nullable|unique:users',
            'name' => 'required',
            'dpi' => 'required|min:12',
            'email_address' => 'required|email',
            'password' => 'required|min:5',
            'repeat_password' => 'required|same:password',
        ]);

        $data = $request->all();
        $data['email'] = $data['email_address'];
        $data['role'] = 'PUBLIC';

        #$data['name'] = array_key_exists('nip', $data) ? $data['nip'] : $data['dpi'];
        $this->create($data);

        $credentials = ['email' => $data['email'], 'password' => $data['password']];
        $login = Auth::attempt($credentials);

        if ($login) {
            return redirect()->intended('main')
                ->withSuccess('Entrando correctamente');
        } else {
            return redirect()->intended('login')
                ->withError('Error de registro');
        }
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'name' => $data['name'],
            'dpi' => $data['dpi'],
            'type' => $data['type'],
            'nip' => array_key_exists('nip', $data) ? $data['nip'] : null,
            'role' => $data['role'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
