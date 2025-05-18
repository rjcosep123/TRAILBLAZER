<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;

class RedirectInfoController extends Controller
{
    public function handleRedirect(Request $request)
    {
        $reservationData = [
            'room' => $request->input('room'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ];

        if (session()->has('student_id')) {
            $student = Student::find(session('student_id'));

            if (!$student) {
                return redirect()->route('student.login')->withErrors(['message' => 'Student not found. Please log in again.']);
            }

            return view('studinfo', [
                'user' => $student,
                'reservationData' => $reservationData
            ]);

        } elseif (session()->has('faculty_id')) {
            $faculty = Faculty::find(session('faculty_id'));

            if (!$faculty) {
                return redirect()->route('faculty.login')->withErrors(['message' => 'Faculty not found. Please log in again.']);
            }

            return view('faculinfo', [
                'user' => $faculty,
                'reservationData' => $reservationData
            ]);
        }

        return redirect()->route('afterlog')->withErrors(['message' => 'User not authenticated.']);
    }
}
