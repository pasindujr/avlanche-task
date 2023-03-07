<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CreateForm extends Component
{
    use LivewireAlert;

    public $name;

    public $weight;

    protected $rules = [
        'name' => 'required',
        'weight' => 'required|integer|max:4|min:1',
    ];

    public function submit()
    {
        $this->validate();

        Subject::create([
            'name' => $this->name,
            'weight' => $this->weight,
        ]);

        $this->alert('success', 'Subject successfully registered!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.subject.create-form');
    }
}
