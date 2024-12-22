<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('landing');
});

Route::resource('patients', PatientController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('doctors', DoctorController::class);
?>