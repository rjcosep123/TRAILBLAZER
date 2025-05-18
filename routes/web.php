<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\FacultyAuthController; // ✅ Import FacultyAuthController

// Home Page
Route::get('/', function () {
    return view('index');
});

// Student Routes
Route::get('/student', function () {
    return view('student');
})->name('student.login'); // Student Login Page

Route::post('/register-student', [StudentAuthController::class, 'register'])->name('student.register'); // Student Registration Handler

Route::get('/studentsign', function () {
    return view('studentsign');
}); // Student Sign Up Page

// Faculty Routes
Route::get('/faculty', function () {
    return view('faculty');
})->name('faculty.login'); // Faculty Login Page

Route::post('/register-faculty', [FacultyAuthController::class, 'register'])->name('faculty.register'); // Faculty Registration Handler

Route::get('/facultysign', function () {
    return view('facultysign');
}); // Faculty Sign Up Page
