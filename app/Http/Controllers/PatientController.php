<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
    
        $patients = Patient::all();
        $nav = 'Patients';
    
        return view('patients.index', compact('patients', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Add Patient';
        return view('patients.register_patient', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'patient_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:patient,email',
            'phone' => 'required',
            'address' => 'required',
            'id_card' => 'required|string|unique:patient,id_card',
            'username' => 'required|string|unique:patient,username',
            'password' => 'required|string|min:8', // Added min length validation
        ]);

        // Hash the password before saving
        $validateData['password'] = bcrypt($validateData['password']);
        
        Patient::create($validateData);
        
        return redirect()->route('patients.index')->with('success', 'Patient has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        $nav = 'Patient Details - ' . $patient->patient_name;
        return view('patients.show', compact('patient', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        $nav = 'Edit Patient - ' . $patient->patient_name;
        return view('patients.edit', compact('patient', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        $validateData = $request->validate([
            'patient_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:patient,email',
            'phone' => 'required',
            'address' => 'required',
            'id_card' => 'required|string|unique:patient,id_card',
            'username' => 'required|string|unique:patient,username',
            'password' => 'required',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient has been deleted.');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        $nav = 'Login';
        return view('patients.login', compact('nav'));
    }

    /**
     * Handle login request.
     */
    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $patient = Patient::where('username', $request->username)->first();

        // Check if patient exists and verify password
        if ($patient && Hash::check($request->password, $patient->password)) {
            Auth::login($patient);
            return redirect()->route('patients.index')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

}
