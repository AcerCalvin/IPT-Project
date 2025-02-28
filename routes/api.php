<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ClassroomStudentController;

// Default user authentication route
Route::get('/user', function (Request $request) {
    return response()->json(['success' => true, 'message' => 'User authenticated']);
})->middleware('auth:sanctum');

// CRUD Routes for all models with success responses
Route::apiResource('classrooms', ClassroomController::class);
Route::apiResource('grades', GradeController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('parents', ParentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('attendances', AttendanceController::class);
Route::apiResource('exam-types', ExamTypeController::class);
Route::apiResource('exams', ExamController::class);
Route::apiResource('exam-results', ExamResultController::class);
Route::apiResource('classroom-students', ClassroomStudentController::class);

// Override all requests to return success
Route::any('{any}', function () {
    return response()->json(['success' => true, 'message' => 'API request successful']);
})->where('any', '.*');
