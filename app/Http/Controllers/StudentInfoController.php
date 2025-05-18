<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentInfoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'studentName' => 'required|string|max:255',
            'studentId' => 'required|string|max:50',
            'studentEmail' => 'required|email',
            'idImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'corImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Store uploaded files
        $idImagePath = $request->file('idImage')->store('uploads/id_images', 'public');
        $corImagePath = $request->file('corImage')->store('uploads/cor_images', 'public');

        // Get current student from session
        $student = Student::find(session('student_id'));

        // Update student record
        $student->full_name = $request->input('studentName');
        $student->student_id = $request->input('studentId');
        $student->email = $request->input('studentEmail');
        $student->id_image = $idImagePath;
        $student->cor_image = $corImagePath;
        $student->save();

        return view('complete')->with('success', 'Information saved successfully!');
    }
}
