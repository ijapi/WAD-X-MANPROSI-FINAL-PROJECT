<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Add Medicine';
        return view('medicines.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|email|unique:patient,email',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        Medicine::create($validateData);
        return redirect()->route('medicines.index')->with('success', 'Medicine has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $nav = 'Medicine Details - ' . $medicine->name;
        return view('medicines.show', compact('medicine', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $nav = 'Edit Medicine - ' . $medicine->name;
        return view('patients.edit', compact('patient', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medicine = Patient::findOrFail($id);

        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|email|unique:patient,email',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Medicine has been deleted.');
    }
}