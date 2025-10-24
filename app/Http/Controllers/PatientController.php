<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $patients = Patient::latest()->get();
        // return view('patients.index', compact('patients'));
        $patients = Patient::latest()->paginate(6); // ✅ 6 per page (you can change this)
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'sex' => ['required', Rule::in(['male', 'female'])],
            'birthdate' => ['required', 'date'],
            'contactnumber' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients,email'],
            'address' => ['required', 'string'],
            'bloodtype' => ['required', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],
            'allergies' => ['required', 'string'],
            'emergencycontactname' => ['required', 'string', 'max:255'],
            'emergencycontactnumber' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
        ]);
        try {
            $validated['patientcode'] = 'PT-' . now()->year . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $patient = Patient::create($validated);
            Mail::to($patient->email)->send(new TestMail($patient));
            return redirect()->route('patient.index')->with('success', 'Record saved successfully!');
        } catch (\Exception $e) {
            logger('Error creating patient (Eloquent):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to delete record',
                'msg' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'sex' => ['required', Rule::in(['male', 'female'])],
            'birthdate' => ['required', 'date'],
            'contactnumber' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients,email,' . $patient->id],
            'address' => ['required', 'string'],
            'bloodtype' => ['required', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],
            'allergies' => ['required', 'string'],
            'emergencycontactname' => ['required', 'string', 'max:255'],
            'emergencycontactnumber' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
        ]);
        try {
            $patient->update($validated);
            return redirect()->route('patient.index')->with('success', 'Patient updated successfully!');
        } catch (\Exception $e) {
            logger('Error updating patient (Eloquent):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to delete record',
                'msg' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();
            return redirect()->route('patient.index')->with('success', 'Patient deleted successfully!');
        } catch (\Exception $e) {
            logger('Error deleting patient (Eloquent):', [$e->getMessage()]);
            return response()->json([
                'error' => 'Failed to delete record',
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
