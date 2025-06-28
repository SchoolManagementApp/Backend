<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\ValidateToken;

Route::get('/students', [StudentController::class, 'getAllStudents']);
Route::get('/grades', [StudentController::class, 'getAllGrades']);
Route::get('/classes', [StudentController::class, 'getAllclassrooms']);
Route::get('/students/{student}/grades', [StudentController::class, 'getStudentGrades']);
Route::post('/students/addstudent', [StudentController::class, 'AddNewStudent']) ->middleware(ValidateToken::class);
Route::patch('/students/{student}', [StudentController::class, 'updateStudent']) ->middleware(ValidateToken::class);
Route::delete('/students/{student}', [StudentController::class, 'deleteStudent']) ->middleware(ValidateToken::class);
