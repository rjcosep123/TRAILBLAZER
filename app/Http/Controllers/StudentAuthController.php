<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'fullName' => 'required|string|max:255',
            'signupEmail' => 'required|string|email|unique:students,email',
            'signupPassword' => 'required|string|min:6|confirmed',
        ]);

        // Create the student record
        Student::create([
            'full_name' => $request->input('fullName'), // updated to match your model's field
            'email' => $request->input('signupEmail'),
            'password' => Hash::make($request->input('signupPassword')),
        ]);

        // Redirect after successful registration
        return redirect()->route('student.login')->with('success', 'Account created. You can now log in.');
    }
}
