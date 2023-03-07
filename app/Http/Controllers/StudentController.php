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
        $averageMarks = 0;

        // Calculate the total marks
        $totalMarks = 0;
        foreach ($marks as $subject) {
            if (!$subject->pivot->mark == '') {
                $totalMarks += $subject->pivot->mark;
            }
        }

        // Calculate the average marks
        if (count($marks) != 0) {
            $averageMarks = $totalMarks / count($marks);

            // Round the average marks to two decimal places
            $averageMarks = round($averageMarks, 2);
        }


        return view('students.student.welcome', compact('marks', 'averageMarks'));
    }
}
