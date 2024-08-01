<?php

use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\PermissionRegistrar;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {

    Route::middleware(['role:super admin|admin'])->group(function() {
        
        Route::resource('roles', RoleController::class);
        Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy'])->name('roles.delete');
        Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionsToRole'])->name('roles.give-permissions');
        Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionsToRole'])->name('roles.give-permissions');
        
        Route::resource('permissions', PermissionController::class);
        Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
        
        Route::resource('users', UserController::class);
        Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
    });

    Route::middleware('role:super admin|admin|staff')->group(function(){
        Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
        Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
        Route::get('/students/{student}/show', [StudentsController::class, 'show'])->name('students.show');
        Route::post('/students/add', [StudentsController::class, 'add'])->name('students.add');
        Route::get('/students/edit/{nisn}', [StudentsController::class, 'edit'])->name('students.edit');
        Route::patch('/students/update/{nisn}', [StudentsController::class, 'update'])->name('students.update');
        Route::delete('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');
    });

});


// Route::get('/students', [StudentsController::class, 'index'])->name('students.index');

// Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

// Route::post('/students/add', [StudentsController::class, 'add'])->name('students.add');

// Route::get('/students/edit/{nisn}', [StudentsController::class, 'edit'])->name('students.edit');

// Route::patch('/students/update/{nisn}', [StudentsController::class, 'update'])->name('students.update');

// Route::delete('/students/delete/{id}', [StudentsController::class, 'delete'])->name('students.delete');

// routing role
// Route::middleware('auth')->group(function(){
//     Route::middleware('role:admin')->group(function(){
//         Route::get('/admin', function(){
//             return 'admin';
//         });
//     });

//     Route::middleware('role:siswa')->group(function(){
//         Route::get('/siswa', function(){
//             return 'siswa';
//         });
//     });
// });