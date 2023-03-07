<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class LiveAverageCard extends Component
{
    public $subjects;
    public $studentName;
    public $averageMarks = 0;
    protected $listeners = ['mark-updated' => '$refresh'];

    public function mount($subjects)
    {
        $this->subjects = $subjects;
        $this->averageMarks = $this->calculateAverageMarks();
    }
    public function calculateAverageMarks()
    {

        // Calculate the total marks
        $totalMarks = 0;
        foreach ($this->subjects as $subject) {
            if (!$subject->pivot->mark == '') {
                $totalMarks += $subject->pivot->mark;
            }
        }

        // Calculate the average marks
        if (count($this->subjects) != 0) {
            $this->averageMarks = $totalMarks / count($this->subjects);

            // Round the average marks to two decimal places
            $this->averageMarks = round($this->averageMarks, 2);
        }
        return $this->averageMarks;
    }
    public function render()
    {
        return view('livewire.student.live-average-card');
    }
}
