<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserController extends Controller
{
    use LivewireAlert;

    public function index(): View
    {
        return view('students.index');
    }

    public function dashboard()
    {
        $studentCount = User::where('is_student', 1)
            ->count();

        $subjectCount = Subject::count();

        return view('dashboard', compact('studentCount', 'subjectCount'));
    }

    public function edit(User $user): View
    {

        return view('students.edit', compact('user'));
    }

    public function delete(User $user)
    {
        $deleted = $user->delete();

        return redirect()->back()->with('student-deleted', 'Student Deleted!');
    }

    public function assignSubjects(User $user)
    {
        $subjects = Subject::select('id', 'name')
            ->get();

        $student = User::find($user->id);
        $subjectsOfStudent = $student->subjects()->get();
        $subjectIds = $subjectsOfStudent->pluck('pivot.subject_id')->toArray();

        return view('students.assign.subjects', compact('user', 'subjects', 'subjectIds'));
    }

    public function assignMarks(User $user)
    {
        $subjects = $user->subjects;


        $markArray = $subjects->pluck('pivot.marks')->toArray();

        return view('students.assign.marks', compact('user', 'subjects', 'markArray'));
    }
}
