<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;

class FacultyInfoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'facultyName' => 'required|string|max:255',
            'facultyEmail' => 'required|email|unique:faculties,email',
            'facultyNumber' => 'required|string',
        ]);

        Faculty::create([
            'full_name' => $request->input('facultyName'),
            'email' => $request->input('facultyEmail'),
            'password' => Hash::make('default_password'), // or generate/set one securely
        ]);

        return view('complete')->with('success', 'Information saved successfully!');
    }
}
