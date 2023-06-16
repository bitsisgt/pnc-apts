<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('login');
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
            return redirect()->intended('dashboard')
                        ->withSuccess('Entrando correctamente');
        }
        return redirect("login")->withErrors(['login' =>'Las credenciales no coinciden, por favor intente de nuevo']);
    }



    public function registration()
    {
        return view('registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function signOut() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }
}
