<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\HospitalsController;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\InquiriesPatientController;
use App\Http\Controllers\AppointmentManagementController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\AppointmentHistoryController;

use App\Http\Controllers\UserViewController;
use App\Http\Controllers\ResetPasswordController;


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
Route::get('appointment/citas/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
Route::get('appointment/patients/{id}', [AppointmentController::class, 'showPatient'])->name('patient.show');

Route::get('patient', [ProfileController::class, 'patient_admin'])->name('admin.patient');
Route::get('patient/profile/{id?}', [ProfileController::class, 'patient_profile'])->name('profile.patient');
Route::get('patient/user', [ProfileController::class, 'user_patient_profile'])->name('user.patient');
Route::post('patient/profile', [ProfileController::class, 'save'])->name('profile.save');
Route::post('patient/update', [ProfileController::class, 'update'])->name('profile.update');

// Router maintenance
Route::get('maintenance/appointment-management', [AppointmentManagementController::class, 'maintenance_appointment_management'])->name('maintenance.appointment_management');
Route::get('maintenance/availability', [AvailabilityController::class, 'maintenance_availability'])->name('maintenance.availability');
Route::get('maintenance/appointment-history', [AppointmentHistoryController::class, 'maintenance_appointment_history'])->name('maintenance.appointment_history');

Route::get('maintenance/patients', [PatientsController::class, 'maintenance_patients'])->name('maintenance.patients');
Route::get('maintenance/inquiries-patient', [InquiriesPatientController::class, 'maintenance_inquiries_patients'])->name('maintenance.inquiries_patient');
Route::get('maintenance/users', [UsersController::class, 'maintenance_users'])->name('maintenance.users');
Route::get('maintenance/doctors', [DoctorsController::class, 'maintenance_doctors'])->name('maintenance.doctors');
Route::get('maintenance/hospitals', [HospitalsController::class, 'maintenance_hospitals'])->name('maintenance.hospitals');
Route::get('maintenance/specialities', [SpecialitiesController::class, 'maintenance_specialities'])->name('maintenance.specialities');


Route::get('user-view', [UserViewController::class, 'user_view'])->name('user_view');

Route::view('/error', 'error')->name('error');

Route::view('/forgot-passwd', 'forgot_passwd')->name('forgot.passwd');
Route::get('reset-passwd', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-passwd', [ResetPasswordController::class, 'reset'])->name('password.update');

// Routers form
Route::get('hospital-form', [HospitalsController::class, 'create'])->name('hospital.form');
Route::get('doctor-form', [DoctorsController::class, 'create'])->name('doctor.form');
Route::get('specialities-form', [SpecialitiesController::class, 'create'])->name('specialities.form');
Route::get('appointment-management-form', [AppointmentManagementController::class, 'create'])->name('appointment.management.form');
Route::get('availability-form', [AvailabilityController::class, 'create'])->name('availability.form');
Route::get('user-form', [UsersController::class, 'create'])->name('user.form');
Route::get('patient-form', [PatientsController::class, 'create'])->name('patient.form');

Route::get('appointment/{id}/edit', [AppointmentManagementController::class, 'edit'])->name('appointment.edit');
Route::put('appointment/{id}', [AppointmentManagementController::class, 'update'])->name('appointment.update');



// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
