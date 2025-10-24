<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(6);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255']
        ]);

        Doctor::create($validated);
        return redirect()->route('doctor.index')->with('success', 'Doctor added successfully!');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255']
        ]);

        $doctor->update($validated);
        return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully!');
    }
}
