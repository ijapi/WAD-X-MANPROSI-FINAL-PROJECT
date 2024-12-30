<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;


class AdminPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all(); 
        $nav = 'Patients';
        
        return view('admins.adminPatient.index', compact('patients', 'nav')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Add Patient';
        return view('admins.adminPatient.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'patient_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:patient,email',
            'phone' => 'required',
            'address' => 'required',
            'id_card' => 'required|string|unique:patient,id_card',
        ]);
    


        $validatedData['password'] = bcrypt('defaultPassword123');

        Patient::create($validatedData);
    
        return redirect()->route('adminPatient.index')->with('success', 'Patient has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        $nav = 'Patient Details - ' . $patient->name;
        return view('adminPatient.show', compact('patient', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        $nav = 'Edit Patient';

        return view('admins.adminPatient.edit', compact('patient', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        $validatedData = $request->validate([
            'patient_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:patient,email,' . $id,
            'phone' => 'required',
            'address' => 'required',
            'id_card' => 'required|string|unique:patient,id_card,' . $id,
        ]);

        $patient->update($validatedData);

        return redirect()->route('adminPatient.index')->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('adminPatient.index')->with('success', 'Patient has been deleted.');
    }

    public function exportPdf() 
    {
        $patients = Patient::all();
        $nav = 'Patient List'; 

        return Pdf::view('admins.adminPatient.pdf', compact('patients', 'nav'))
        ->download('patient_list.pdf');
    }

}