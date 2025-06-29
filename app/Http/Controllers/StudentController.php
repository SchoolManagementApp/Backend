<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

     public function getAllclassrooms()
    {
       return [ "data" => Classroom::all() ];
    }

    function AddNewStudent(Request $request) {
        $validator = Validator::make($request -> all(), $this -> buildRules());

        if ($validator -> fails()) {
            return response() -> json(["errors" => $validator -> errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $student = new Student($validator->validated());
            $student->save();
            return $student;
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') { // SQLSTATE code for integrity constraint violation
                // Check if the error is specifically for the email column
                if (strpos($e->getMessage(), 'UNIQUE constraint failed: students.email') !== false) {
                    return response()->json(['error' => 'Student with this email already exists.'], Response::HTTP_CONFLICT);
                }
            }
            // If not the expected error, rethrow or handle as general error
            return response()->json(['error' => 'An error occurred while saving the student.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

   function buildRules() {
        return [
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "birthday" => "required|date_format:Y-m-d|before:today",
            "phone" => "required|string|min:10|max:20",
            "gender" => "required|in:male,female",
            "class_id" => "required|uuid|exists:classrooms,id",
            "photo" => "nullable|image|mimes:jpeg,png|max:2048",
        ];
    }


    public function updateStudent(Request $request, $student_id)
    {
        echo $student_id;
        $student = Student::find($student_id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        // For PATCH, validate only the fields present in the request
        $rules = $this->buildRules();
        // Only validate fields that are present in the request
       $rules = array_intersect_key($rules, $request->all());

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student->fill($validator->validated());
        $student->save();

        return response()->json($student, Response::HTTP_OK);
    }

    public function deleteStudent($student_id)
    {
        $student = Student::find($student_id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], Response::HTTP_OK);
    }

    public function getStudentGrades($student_id) {
        $student =Student::with(['grades.course', 'grades.lecturer'])->findOrFail($student_id);//The with(['grades.course', 'grades.lecturer']) part tells Laravel to load the student's grades, and for each grade, also load the related course and lecturer. Looks up the student by their ID using Eloquent’s findOrFail() method.If the student with that ID does not exist, Laravel will automatically return a 404 error
        $grades = $student->grades->map([$this, 'formatGrade']);
        return response()->json([
            'student' => [
                'id'         => $student->id,
                'first_name' => $student->first_name,
                'last_name'  => $student->last_name,
            ],
            'grades' => $grades,
        ]);
    }

    public function formatGrade($grade)
    {
        return [
            'course'   => $grade->course->name ?? null,
            'score'    => $grade->score,
            'remarks'  => $grade->remarks,
            'lecturer' => $grade->lecturer->first_name ?? null,
        ];
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
