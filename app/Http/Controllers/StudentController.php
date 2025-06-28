<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getAllStudents()
    {
       return [ "data" => Student::all() ];
    }

     public function getAllGrades()
    {
       return [ "data" => Grade::all() ];
    }

     public function getStudentsGrades(Grade $grades )
    {
        return [ "data" => $grades -> student_id ];
    }

    public function index()
    {
        $students = Student::with(['course','grades'])->get();
        return response()->json($students, Response::HTTP_OK);
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
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:students',
            'phone'      => 'required|string',
            'gender'     => 'required|in:male,female,other',
            'course_id'  => 'required|exists:courses,id',
        ]);

        $student = Student::create($data);

        return response()->json($student->load(['course','grades']), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json($student->load(['course','grades']), Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:students,email,'.$student->id,
            'phone'      => 'required|string',
            'gender'     => 'required|in:male,female,other',
            'course_id'  => 'required|exists:courses,id',
        ]);

        $student->update($data);

        return response()->json($student->load(['course','grades']), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }
}
