<?php

namespace App\Http\Livewire\Student;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditForm extends Component
{
    use LivewireAlert;

    public $user;

    public $name;

    public $email;

    public $studentId;

    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->studentId = $this->user->id;
    }

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();

        $student = User::where('id', $this->studentId)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

        if ($student) {
            $this->alert('success', 'Student successfully updated!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.student.edit-form');
    }
}
