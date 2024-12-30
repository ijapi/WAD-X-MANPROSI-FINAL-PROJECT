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
    // Display all appointments with filters
    public function index(Request $request)
    {
        $status = $request->query('status');
        $appointments = Appointment::all();

        return view('admins.adminappointments.index', compact('appointments', 'status'));
    }

    // Show the create appointment form
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $specializations = Specialization::all();
        return view('admins.adminappointments.create', compact('patients', 'doctors', 'specializations'));
    }

    // Store a new appointment
    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'patient_id' => 'required|exists:patient,id',
            'doctor_id' => 'required|exists:doctor,id',
            'specialization_id' => 'required|exists:specializations,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Create appointment record
        Appointment::create($request->all());

        // Redirect back with success message
        return redirect()->route('adminappointments.index')->with('success', 'Appointment created successfully!');
    }

    // Toggle appointment completion status (Complete/Incompleted)
    public function markAsComplete($id)
    {
        $appointment = Appointment::findOrFail($id);

        // Check current status and toggle it
        if ($appointment->status === 'completed') {
            $appointment->status = 'pending';  // Mark as incomplete
        } else {
            $appointment->status = 'completed'; // Mark as complete
        }

        $appointment->save();

        return redirect()->route('adminappointments.index')->with('success', 'Appointment status updated successfully.');
    }

    // Update appointment status
    // Show the edit appointment form
    public function edit($id)
    {
        // Fetch the appointment to be edited
        $appointment = Appointment::findOrFail($id);
        
        // Fetch other necessary data
        $patients = Patient::all();
        $doctors = Doctor::all();
        $specializations = Specialization::all();

        // Return the edit view with the appointment and data for dropdowns
        return view('admins.adminappointments.edit', compact('appointment', 'patients', 'doctors', 'specializations'));
    }

    // Update the appointment
    public function update(Request $request, $id)
    {
        // Validate the data
        $request->validate([
            'patient_id' => 'required|exists:patient,id',
            'doctor_id' => 'required|exists:doctor,id',
            'specialization_id' => 'required|exists:specializations,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Find the appointment and update its data
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        // Redirect back to the list of appointments
        return redirect()->route('adminappointments.index')->with('success', 'Appointment updated successfully!');
    }


    // Export appointment details to PDF
    public function exportToPDF($id)
    {
        $appointment = Appointment::with(['patients', 'doctors', 'specializations'])->findOrFail($id);

        $pdf = Pdf::loadView('admins.adminappointments.pdf', compact('appointment'));
        return $pdf->download("appointment-{$appointment->id}.pdf");
    }

    // Delete an appointment
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Appointment deleted successfully.');
    }
}
