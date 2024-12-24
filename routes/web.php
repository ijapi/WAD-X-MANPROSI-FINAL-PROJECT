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
});


Route::get('/admins/login', [AdminController::class, 'showLoginForm'])->name('admins.login');
Route::post('/admins/login', [AdminController::class, 'login']);
Route::get('/admins/home', [AdminController::class, 'home'])->name('admins.home');

Route::get('/patients/login', [PatientController::class, 'showLoginForm'])->name('patients.login');
Route::post('/patients/login', [PatientController::class, 'login']);
Route::post('/patients/logout', [PatientController::class, 'logout'])->name('patients.logout');

Route::get('/adminPatients', [AdminPatientController::class, 'index'])->name('adminPatient.index');

Route::get('/medicines.index', function () {
    return view('medicines.index');
});

Route::get('/adminmedicine', [AdminMedicineController::class, 'index'])->name('adminmedicine.index');
Route::get('/adminmedicine/create', [AdminMedicineController::class, 'create'])->name('adminmedicine.create');
Route::put('/adminmedicine/{id}', [AdminMedicineController::class, 'update'])->name('adminmedicine.update');
Route::get('/adminmedicine/{id}/edit', [AdminMedicineController::class, 'edit'])->name('adminmedicine.edit');






Route::resource('admins', AdminController::class);
Route::resource('admins', AdminPatientController::class);
Route::resource('patients', PatientController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('adminmedicine', AdminMedicineController::class);
?>