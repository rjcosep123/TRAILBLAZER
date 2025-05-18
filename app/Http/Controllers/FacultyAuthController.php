<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;

class FacultyAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'signupEmail' => 'required|string|email|unique:faculties,email',
            'signupPassword' => 'required|string|min:6|confirmed',
        ]);

        Faculty::create([
            'full_name' => $request->input('fullName'),
            'email' => $request->input('signupEmail'),
            'password' => Hash::make($request->input('signupPassword')),
        ]);

        return redirect()->route('faculty.login')->with('success', 'Account created successfully. You can now log in.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'facultyEmail' => 'required|email',
            'facultyPassword' => 'required|string',
        ]);

        $faculty = Faculty::where('email', $request->facultyEmail)->first();

        if (!$faculty || !Hash::check($request->facultyPassword, $faculty->password)) {
            return back()->withErrors(['loginError' => 'Invalid email or password.'])->withInput();
        }

        // ✅ Clear student session if exists
        session()->forget('student_id');

        // ✅ Store faculty ID in session
        session(['faculty_id' => $faculty->id]);

        return redirect()->route('afterlog');
    }
}
