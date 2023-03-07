<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SubjectController extends Controller
{
    use LivewireAlert;

    public function index(): View
    {
        return view('subjects.index');
    }

    public function edit(Subject $subject): View
    {
        return view('subjects.edit', compact('subject'));
    }

    public function delete(Subject $subject)
    {
        $deleted = $subject->delete();

        return redirect()->back()->with('subject-deleted', 'Subject Deleted!');
    }
}
