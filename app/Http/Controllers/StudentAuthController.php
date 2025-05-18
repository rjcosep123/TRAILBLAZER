<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'signupEmail' => 'required|string|email|unique:students,email',
            'signupPassword' => 'required|string|min:6|confirmed',
        ]);

        Student::create([
            'full_name' => $request->input('fullName'),
            'email' => $request->input('signupEmail'),
            'password' => Hash::make($request->input('signupPassword')),
        ]);

        return redirect()->route('student.login')->with('success', 'Account created. You can now log in.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'studentEmail' => 'required|email',
            'studentPassword' => 'required|string',
        ]);

        $student = Student::where('email', $request->studentEmail)->first();

        if (!$student || !Hash::check($request->studentPassword, $student->password)) {
            return back()->withErrors(['loginError' => 'Invalid email or password.'])->withInput();
        }

        // ✅ Clear faculty session if exists
        session()->forget('faculty_id');

        // ✅ Store student ID in session
        session(['student_id' => $student->id]);

        return redirect()->route('afterlog');
    }
}
