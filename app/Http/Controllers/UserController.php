<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('students.index');
    }

    public function edit(User $user): View
    {

        return view('students.edit', compact('user'));
    }
}
