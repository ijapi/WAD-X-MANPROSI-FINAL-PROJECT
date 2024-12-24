<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminPatientController;
use App\Http\Controllers\AdminMedicineController;

Route::get('/', function () {
    return view('landing');
})->name('views.landing');

// Admin Routes
Route::get('/admins/login', [AdminController::class, 'showLoginForm'])->name('admins.login');
Route::post('/admins/login', [AdminController::class, 'login']);
Route::get('/admins/home', [AdminController::class, 'home'])->name('admins.home');

// Patient Routes
Route::get('/patients/login', [PatientController::class, 'showLoginForm'])->name('patients.login');
Route::post('/patients/login', [PatientController::class, 'login']);
Route::post('/patients/logout', [PatientController::class, 'logout'])->name('patients.logout');
Route::post('/patients', [AdminPatientController::class, 'store'])->name('patients.store');
Route::get('/adminPatients/{id}/edit', [AdminPatientController::class, 'edit'])->name('adminPatient.edit');

// Medicine Routes
Route::get('/medicines.index', function () {
    return view('medicines.index');
});

Route::resource('adminPatient', AdminPatientController::class);
Route::resource('adminmedicine', AdminMedicineController::class);


// Other Resource Routes
Route::resource('admins', AdminController::class);
Route::resource('patients', PatientController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('doctors', DoctorController::class);

