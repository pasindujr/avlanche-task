<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('employees.index', compact('users'));
    }

    public function create()
    {

        $departments = Department::all();
        $positions = Position::all();


        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(EmployeeRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'position_id' => $request->position,
            'department_id' => $request->department,
            'is_admin' => $request->admin,
            'password' => Hash::make($request->password),
        ]);

        toast('Employee Created!','success');

        return redirect()->route('employees.index')->with('status', 'Employee created!');
    }

    public function show(User $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function destroy(User $employee)
    {
        $employee->delete();

        toast('Employee Deleted!','success');

        return redirect()->back()->with('status', 'Employee deleted!');
    }

}
