<?php

    namespace App\Http\Controllers;
    
    use App\Models\Doctor;
    use Illuminate\Http\Request;
    
    class DoctorController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $doctors = Doctor::all();
            $nav = 'Doctors';
    
            return view('doctors.index', compact('doctors', 'nav'));
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $nav = 'Add Doctor';
            return view('doctors.register_doctor', compact('nav'));
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors,email',
                'working_hours' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'specialization_id' => 'required|integer|exists:specializations,id',
                'phone' => 'required|string|max:15',
                'license_number' => 'required|string|max:50|unique:doctors,license_number',
            ]);
    
            $validateData['password'] = bcrypt($validateData['password']); // Encrypt password
    
            Doctor::create($validateData);
            return redirect()->route('doctors.index')->with('success', 'Doctor has been added.');
        }
    
        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $doctor = Doctor::findOrFail($id);
            $nav = 'Doctor Details - ' . $doctor->name;
            return view('doctors.show', compact('doctor', 'nav'));
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $doctor = Doctor::findOrFail($id);
            $nav = 'Edit Doctor - ' . $doctor->name;
            return view('doctors.edit', compact('doctor', 'nav'));
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $doctor = Doctor::findOrFail($id);
    
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors,email,' . $doctor->id,
                'working_hours' => 'required|string|max:255',
                'password' => 'nullable|string|min:8',
                'specialization_id' => 'required|integer|exists:specializations,id',
                'phone' => 'required|string|max:15',
                'license_number' => 'required|string|max:50|unique:doctors,license_number,' . $doctor->id,
            ]);
    
            if ($request->filled('password')) {
                $validateData['password'] = bcrypt($validateData['password']); // Encrypt password if provided
            }
    
            $doctor->update($validateData);
            return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();
            return redirect()->route('doctors.index')->with('success', 'Doctor has been deleted.');
    }
}