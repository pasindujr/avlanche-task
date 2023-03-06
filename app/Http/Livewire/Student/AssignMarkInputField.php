<?php

namespace App\Http\Livewire\Student;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AssignMarkInputField extends Component
{
    public $studentId;
    public $subjectId;
    public $mark;

    public function updated()
    {
        $this->mark();
    }

    public function mark()
    {
        $student = User::where('id', $this->studentId)
            ->first();

        $student->subjects()->updateExistingPivot($this->subjectId, [
            'mark' => $this->mark
        ]);

    }

    public function render()
    {
        return view('livewire.student.assign-mark-input-field');
    }
}
