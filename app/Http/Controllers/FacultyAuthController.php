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
}
