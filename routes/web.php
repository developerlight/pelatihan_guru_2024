<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students/add', [StudentsController::class, 'add'])->name('students.add');
    Route::get('/students/edit/{nisn}', [StudentsController::class, 'edit'])->name('students.edit');
    Route::patch('/students/update/{nisn}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');
});

// Route::get('/students', [StudentsController::class, 'index'])->name('students.index');

// Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

// Route::post('/students/add', [StudentsController::class, 'add'])->name('students.add');

// Route::get('/students/edit/{nisn}', [StudentsController::class, 'edit'])->name('students.edit');

// Route::patch('/students/update/{nisn}', [StudentsController::class, 'update'])->name('students.update');

// Route::delete('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');