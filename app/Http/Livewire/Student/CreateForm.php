<?php

namespace App\Http\Livewire\Student;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateForm extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $password;
    public $passwordValidation;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|required_with:passwordValidation|same:passwordValidation',
        'passwordValidation' => 'min:8'
    ];

    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->alert('success', 'Student successfully registered!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        $this->reset();
    }
    public function render()
    {
        return view('livewire.student.create-form');
    }
}
