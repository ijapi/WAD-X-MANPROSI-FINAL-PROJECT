<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Specialization;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $appointments = Appointment::all();

        return view('admins.adminappointments.index', compact('appointments', 'status'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $specializations = Specialization::all();
        return view('admins.adminappointments.create', compact('patients', 'doctors', 'specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patient,id',
            'doctor_id' => 'required|exists:doctor,id',
            'specialization_id' => 'required|exists:specializations,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Appointment::create($request->all());

        return redirect()->route('adminappointments.index')->with('success', 'Appointment created successfully!');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        
        $patients = Patient::all();
        $doctors = Doctor::all();
        $specializations = Specialization::all();

        return view('admins.adminappointments.edit', compact('appointment', 'patients', 'doctors', 'specializations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patient,id',
            'doctor_id' => 'required|exists:doctor,id',
            'specialization_id' => 'required|exists:specializations,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('adminappointments.index')->with('success', 'Appointment updated successfully!');
    }

    public function markAsComplete($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->status === 'completed') {
            $appointment->status = 'pending';  
        } else {
            $appointment->status = 'completed'; 
        }

        $appointment->save();

        return redirect()->route('adminappointments.index')->with('success', 'Appointment status updated successfully.');
    }

    public function exportToPDF($id)
    {
        $appointment = Appointment::with(['patients', 'doctors', 'specializations'])->findOrFail($id);

        $pdf = Pdf::loadView('admins.adminappointments.pdf', compact('appointment'));
        return $pdf->download("appointment-{$appointment->id}.pdf");
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }
}
