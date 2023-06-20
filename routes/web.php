<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CustomAuthController::class, 'index'])->name('index');
Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('registration');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('forgot', [CustomAuthController::class, 'index'])->name('forgot');
Route::get('main', [CustomAuthController::class, 'main'])->name('main');

Route::get('appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('appointment/calendar', [AppointmentController::class, 'index'])->name('appointment.calendar');
Route::get('appointment/admin', [AppointmentController::class, 'admin'])->name('admin.appointment');
Route::post('appointment/reserve', [AppointmentController::class, 'reserve'])->name('reserve.appointment');
Route::post('appointment/availabilities', [AppointmentController::class, 'available_hours'])->name('appointment.availabilities');

Route::get('patient', [ProfileController::class, 'patient_admin'])->name('admin.patient');
Route::get('patient/profile/{id?}', [ProfileController::class, 'patient_profile'])->name('profile.patient');
Route::get('patient/user', [ProfileController::class, 'user_patient_profile'])->name('user.patient');
Route::post('patient/profile', [ProfileController::class, 'save'])->name('profile.save');
Route::post('patient/update', [ProfileController::class, 'update'])->name('profile.update');


