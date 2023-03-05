<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SubjectController extends Controller
{
    use LivewireAlert;

    public function index(): View
    {
        return view('subjects.index');
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
}
