<?php

namespace App\Http\Livewire\Student;

use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class AssignSubjectCheckBox extends Component
{
    public $studentId;
    public $subjectId;
    public $checked;

public function processAssign()
{
    if ($this->checked) {
        $this->mark();
    } else {
        $this->unMark();
    }

}

    public function mark()
    {
        $subject = Subject::where('id', $this->subjectId)
            ->first();

        $student = User::where('id', $this->studentId)
            ->first();

        $student->subjects()->attach($subject);

    }

    public function unMark()
    {
        $subject = Subject::where('id', $this->subjectId)
            ->first();

        $student = User::where('id', $this->studentId)
            ->first();

        $student->subjects()->detach($subject);

    }
    public function render()
    {
        return view('livewire.student.assign-subject-check-box');
    }
}
