<?php

namespace App\Http\Controllers;

use Akaunting\Apexcharts\Chart;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        if (Gate::allows('is-admin')) {

            //user count and admin count
            $userCount = User::count();
            $adminCount = User::where('is_admin', 1)->count();

            $maleCount = User::where('gender', 'male')->count();
            $femaleCount = User::where('gender', 'female')->count();
            $otherCount = User::where('gender', 'other')->count();

            $genderChart = (new Chart)->setType('donut')
                ->setWidth('80%')
                ->setHeight(300)
                ->setTitle('Employees by Gender')
                ->setForeColor('#ffffff')
                ->setLabels(['Male', 'Female', 'Other'])
                ->setDataset('Employees by Gender', 'donut', [$maleCount, $femaleCount, $otherCount]);

            //get department names with count of users each department
            $departments = Department::withCount('users')->get();

            // make department names as labels and count of users as dataset
            $departmentChart = (new Chart)->setType('bar')
                ->setWidth('80%')
                ->setHeight(300)
                ->setTitle('Employees by Department')
                ->setForeColor('#ffffff')
                ->setLabels($departments->pluck('name')->toArray())
                ->setDataset('Employees by Department', 'bar', $departments->pluck('users_count')->toArray());

            // get position names with count of users each position
            $positions = Position::withCount('users')->get();

            // make position names as labels and count of users as dataset
            $positionChart = (new Chart)->setType('bar')
                ->setWidth('80%')
                ->setHeight(300)
                ->setTitle('Employees by Position')
                ->setForeColor('#ffffff')
                ->setLabels($positions->pluck('name')->toArray())
                ->setFillColors((array)'#f44336',)
                ->setDataset('Employees by Position', 'bar', $positions->pluck('users_count')->toArray());

            return view('dashboard', compact('genderChart', 'departmentChart', 'positionChart', 'userCount', 'adminCount'));
        } else {
            return view('dashboard');
        }
    }

    public function edit(Request $request): View
    {
        $departments = Department::all();
        $positions = Position::all();

        return view('profile.edit', [
            'user' => $request->user(),
            'departments' => $departments,
            'positions' => $positions,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        User::where('id', $request->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'department_id' => $request->department,
            'position_id' => $request->position,
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
