<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditForm extends Component
{
    use LivewireAlert;

    public $subject;
    public $name;
    public $weight;
    public $subjectId;

    public function mount()
    {
        $this->name = $this->subject->name;
        $this->weight = $this->subject->weight;
        $this->subjectId = $this->subject->id;
    }


    protected $rules = [
        'name' => 'required',
        'weight' => 'required|integer|max:4|min:1',
    ];

    public function submit()
    {
        $this->validate();

        $subject = Subject::where('id', $this->subjectId)
            ->update([
                'name' => $this->name,
                'weight' => $this->weight,
            ]);

        if ($subject) {
            $this->alert('success', 'Subject successfully updated!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);

        }
    }
    public function render()
    {
        return view('livewire.subject.edit-form');
    }
}
