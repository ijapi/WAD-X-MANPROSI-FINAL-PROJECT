<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
{
    $appointments = Appointment::with(['doctor', 'specialization'])
                                ->orderBy('appointment_date', 'asc')
                                ->get();

    return view('appointments.index', compact('appointments'));
}
    public function create()
{
    $specializations = Specialization::all();
    $doctors = Doctor::all();

    return view('appointments.create', compact('specializations', 'doctors'));
}

    public function store(Request $request)
    {
    
        $request->validate([
            'doctor_id' => 'nullable|exists:doctor,id',
            'specialization_id' => 'required|exists:specializations,id',
            'appointment_date' => 'required|date|after:today',
            'notes' => 'nullable|string|max:255',
        ]);
    
        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'specialization_id' => $request->specialization_id,
            'appointment_date' => $request->appointment_date,
            'status' => Appointment::STATUS_PENDING,
            'notes' => $request->notes,
        ]);
    
        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment booked successfully.');
    }    

   /**
   * Cancel an appointment
   *
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function cancel(Request $request, $id)
  {
      $appointment = Appointment::findOrFail($id);
  
      $appointment->delete();
      
      return redirect()->route('appointments.index')->with('success', 'Appointment canceled successfully.');
  }
}
