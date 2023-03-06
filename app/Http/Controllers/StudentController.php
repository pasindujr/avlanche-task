<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function welcome()
    {
        $student = User::where('id', auth()->user()->id)->first();

        $marks = $student->subjects;

        return view('students.student.welcome', compact('marks'));
    }
}
