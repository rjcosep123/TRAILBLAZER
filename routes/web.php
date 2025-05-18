<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\FacultyAuthController;
use App\Http\Controllers\RedirectInfoController;
use App\Http\Controllers\StudentInfoController; // ✅ Add this

// Home
Route::get('/', function () {
    return view('index');
});

// Student Routes
Route::get('/student', function () {
    return view('student');
})->name('student.login');

Route::post('/login-student', [StudentAuthController::class, 'login'])->name('student.login.post');
Route::post('/register-student', [StudentAuthController::class, 'register'])->name('student.register');

Route::get('/studentsuploads', function () { // Updated route
    return view('studentsign');
});

// ✅ Store student info (name, ID, email, images)
Route::post('/student-info', [StudentInfoController::class, 'store'])->name('student.info.store');

// Faculty Routes
Route::get('/faculty', function () {
    return view('faculty');
})->name('faculty.login');

Route::post('/login-faculty', [FacultyAuthController::class, 'login'])->name('faculty.login.post');
Route::post('/register-faculty', [FacultyAuthController::class, 'register'])->name('faculty.register');

Route::get('/facultysign', function () {
    return view('facultysign');
});

// After login (student or faculty goes here first)
Route::get('/afterlog', function () {
    return view('afterlog');
})->name('afterlog');

// Handle reservation form submission and redirect to appropriate info page
Route::post('/redirect-info', [RedirectInfoController::class, 'handleRedirect'])->name('redirect.info');

// Info Pages
Route::get('/studinfo', function (Request $request) {
    return view('studinfo', $request->all());
})->name('studinfo');

Route::get('/faculinfo', function (Request $request) {
    return view('faculinfo', $request->all());
})->name('faculinfo');

use App\Models\StudentInfo;

Route::get('/student-uploads', function () {
    $students = StudentInfo::all();
    return view('studentsuploads', compact('students'));
});


use App\Http\Controllers\FacultyInfoController;

Route::post('/faculty/store', [FacultyInfoController::class, 'store'])->name('faculty.info.store');
Route::view('/faculty/success', 'faculty.complete')->name('faculty.success');
