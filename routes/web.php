<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // Student routes
    Route::get('students', [UserController::class, 'index'])->name('students.index');
    Route::view('students/create', 'students.create')->name('students.create');
    Route::get('students/edit/{user}', [UserController::class, 'edit'])->name('students.edit');
    Route::get('students/delete/{user}', [UserController::class, 'delete'])->name('students.delete');
    Route::get('students/assign/subject/{user}', [UserController::class, 'assignSubjects'])->name('students.assign.subject');
    Route::get('students/assign/mark/{user}', [UserController::class, 'assignMarks'])->name('students.assign.mark');

    // Subject routes
    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::view('subjects/create', 'subjects.create')->name('subjects.create');
    Route::get('subjects/edit/{subject}', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::get('subjects/delete/{subject}', [SubjectController::class, 'delete'])->name('subjects.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
