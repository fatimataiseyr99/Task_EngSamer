<?php
https://chat.openai.com/sandbox/student-course-api-postman.json
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TeatcherController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\EnrollmentController;

Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeatcherController::class);
Route::apiResource('courses', CourseController::class);
Route::post('/enroll', [EnrollmentController::class, 'enroll']);

Route::get('/courses/{id}/students', [CourseController::class, 'students']); 
Route::get('/teachers/{id}/courses', [TeatcherController::class, 'courses']);

