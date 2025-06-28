<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'getAllStudents']);
Route::get('/grades', [StudentController::class, 'getAllGrades']);
Route::get('/classes', [StudentController::class, 'getAllclassrooms']);
Route::get('/students/{student}/grades', [StudentController::class, 'getStudentGrades']);
Route::post('/students/addstudent', [StudentController::class, 'AddNewStudent']);
