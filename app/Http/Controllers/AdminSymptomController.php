<?php

namespace App\Http\Controllers;

use App\Models\Symptom; // Import the Symptom model
use App\Models\Specialization;
use Illuminate\Http\Request;

class AdminSymptomController extends Controller
{
    // Show the list of symptoms
    public function index()
    {
        // Get all symptoms from the database
        $symptoms = Symptom::all();
        
        // Return the index view with the symptoms
        return view('admins.adminsymptoms.index', compact('symptoms'));
    }

    // Show the form to create a new symptom
    public function create()
    {
        // Fetch all specializations from the database
        $specializations = Specialization::all(); 

        // Pass specializations to the view
        return view('admins.adminsymptoms.create', compact('specializations'));
    }

    // Method to store the newly created symptom and associated specializations
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specializations' => 'required|array|min:1|max:4', // Between 1 and 4 specializations
            'specializations.*' => 'exists:specializations,id', // Ensure valid specialization IDs
        ]);

        // Create the new symptom
        $symptom = Symptom::create([
            'name' => $validated['name'],
        ]);

        // Attach selected specializations to the symptom
        $symptom->specializations()->attach($validated['specializations']);

        // Redirect back with success message
        return redirect()->route('adminsymptoms.index')
                         ->with('success', 'Symptom created successfully!');
    }


    // Show the form to edit an existing symptom
    // Show the form to edit an existing symptom
    public function edit($id)
    {
        // Find the symptom by its ID
        $symptom = Symptom::findOrFail($id);

        // Fetch all specializations from the database
        $specializations = Specialization::all();

        // Return the edit view with the symptom data and specializations
        return view('admins.adminsymptoms.edit', compact('symptom', 'specializations'));
    }


    // Update an existing symptom in the database
    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'specializations' => 'required|array',
    ]);

    // Find the symptom to update
    $symptom = Symptom::findOrFail($id);
    $symptom->name = $request->name;
    $symptom->save();

    // Sync the selected specializations (many-to-many relationship)
    $symptom->specializations()->sync($request->specializations);

    return redirect()->route('adminsymptoms.index')->with('success', 'Symptom updated successfully');
    }


    // Delete a symptom from the database
    public function destroy($id)
    {
    $symptom = Symptom::findOrFail($id);
    $symptom->delete();

    return redirect()->route('adminsymptoms.index')
                     ->with('success', 'Symptom deleted successfully!');
    }

}