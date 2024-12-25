<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminPatientController;
use App\Http\Controllers\AdminMedicineController;
use App\Http\Controllers\AdminDoctorController;

Route::get('/', function () { 
    return view('landing');})->name('views.landing');

// Admin Routes
Route::get('/admins/login', [AuthController::class, 'showAdminLoginForm'])->name('admins.login');
Route::post('/admins/login', [AuthController::class, 'adminLogin']);
Route::get('/admins/home', [AdminController::class, 'home'])->name('admins.home');
Route::get('/adminPatients/{id}/edit', [AdminPatientController::class, 'edit'])->name('adminPatient.edit');

// Patient Routes
Route::get('/patients/login', [AuthController::class, 'showPatientLoginForm'])->name('patients.login');
Route::post('/patients/login', [AuthController::class, 'patientLogin']);
Route::post('/patients/logout', [AuthController::class, 'logout'])->name('patients.logout');
Route::post('/patients', [AdminPatientController::class, 'store'])->name('patients.store');

// Medicine Routes
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');

 


Route::get('/admindoctors', [MedicineController::class, 'index'])->name('admindoctors.index');


// Other Resource Routes
Route::resource('admins', AdminController::class);
Route::resource('patients', PatientController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('adminPatient', AdminPatientController::class);
Route::resource('adminmedicine', AdminMedicineController::class);
Route::resource('admindoctors', AdminDoctorController::class);
?>

