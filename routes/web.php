<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminPatientController;
use App\Http\Controllers\AdminMedicineController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\AdminSymptomController;
use App\Http\Controllers\SymptomController;



Route::get('/', function () { 
    return view('landing');})->name('views.landing');

// Admin Routes
Route::get('/admins/login', [AuthController::class, 'showAdminLoginForm'])->name('admins.login');
Route::post('/admins/login', [AuthController::class, 'adminLogin']);
Route::get('/admins/home', [AdminController::class, 'home'])->name('admins.home');
Route::get('/adminPatients/{id}/edit', [AdminPatientController::class, 'edit'])->name('adminPatient.edit');

// Patient Routes
Route::get('/login', function () {
    return redirect('/patients/login');})->name('login');

Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/login', [AuthController::class, 'showPatientLoginForm'])->name('patients.login');
Route::post('/patients/login', [AuthController::class, 'patientLogin']);
Route::post('/patients/logout', [AuthController::class, 'logout'])->name('patients.logout');
Route::post('/patients', [AdminPatientController::class, 'store'])->name('patients.store');

Route::get('/patients/profile', [PatientController::class, 'showProfile'])->name('patients.profile')->middleware('auth');
Route::get('/patients/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::patch('/patients/update', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/destroy/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');

// Medicine Routes
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');

// Doctor Routes
Route::get('/admindoctors', [MedicineController::class, 'index'])->name('admindoctors.index');
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');

// Admin Symptom Management Routes

Route::resource('adminsymptoms', AdminSymptomController::class);

// Patient Symptom Routes

// Remove ALL existing symptom routes and replace with just these two
Route::get('/symptoms', [SymptomController::class, 'index'])->name('symptoms.index');
Route::post('/symptoms/recommend', [SymptomController::class, 'recommend'])->name('symptoms.recommend');


// CHeckout 
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');

Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');



// Other Resource Routes
Route::resource('admins', AdminController::class);
Route::resource('adminPatient', AdminPatientController::class);
Route::resource('adminmedicine', AdminMedicineController::class);
Route::resource('admindoctors', AdminDoctorController::class);
Route::resource('patients', PatientController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('symptoms', SymptomController::class);
?>

