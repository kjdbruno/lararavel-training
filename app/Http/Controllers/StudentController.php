<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students= Student::all();
            return view('student.view', compact('students'));
        } catch (\Exception $e) {
            logger('Message logged from StudentController.index', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $student = new Student;
            $student->name = $request->get('name');
            $student->address = $request->get('address');
            $student->email = $request->get('email');
            $student->photo = $request->get('photo');
            $student->grade = $request->get('grade');
            $student->submission_date = $request->get('submission_date');
            $student->save();
            return response()->json([
                'msg' => 'RECORD STORED!',
                'data' => $student
            ], 200);
        } catch (\Exception $e) {
            logger('Message logged from StudentController.store', [$e->getMessage()]);
            return response()->json([
                'error' => 'Something went wrong getting record',
                'msg' => $e->getMessage()
            ], 400);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
