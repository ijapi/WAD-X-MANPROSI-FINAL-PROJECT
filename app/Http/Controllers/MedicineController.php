<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');
    
    if ($query) {
        $medicines = Medicine::where('medicine_name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
    } else {
        $medicines = Medicine::all();
    }

    return view('medicines.index', compact('medicines'));
}

    public function create()
    {
        $nav = 'Add Medicine';
        return view('medicines.create', compact('nav'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'medicine_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Medicine::create($validateData);

        return redirect()->route('medicines.index')->with('success', 'Medicine has been added.');
    }

    public function show(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $nav = 'Medicine Details - ' . $medicine->name;
        return view('medicines.show', compact('medicine', 'nav'));
    }

    public function edit(string $id)
    {
        $medicine = Medicine::findOrFail($id);
        $nav = 'Edit Medicine - ' . $medicine->name;
        return view('medicines.edit', compact('medicine', 'nav'));
    }

    public function update(Request $request, string $id)
    {
        $medicine = Medicine::findOrFail($id);

        $validateData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $medicine->update($validateData);

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroy(string $id)
    {
        $medicine = Medicine::findOrFail($id);

        
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine has been deleted.');
    }
}
