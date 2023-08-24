<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Application Routes
    Route::get('application', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('application-registration', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('application-registration/store', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('application/edit/{id}', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::patch('application/edit/{id}/update', [ApplicationController::class, 'update'])->name('application.update');
    Route::get('application/{id}/show', [ApplicationController::class, 'show'])->name('application.show');
    Route::delete('application/{id}/delete', [ApplicationController::class, 'destroy'])->middleware(['password.confirm', 'verified'])->name('application.destroy');

    // Department Routes
    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('department-registration', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('department-registration', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::patch('department/edit/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('department/{id}', [DepartmentController::class, 'show'])->name('department.show');
    Route::delete('department/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy')->middleware(['password.confirm', 'verified'])->name('department.destroy');

    // Servers and environments
    Route::get('server', [ServerController::class, 'index'])->name('server.index');
    Route::get('server-registration', [ServerController::class, 'create'])->name('server.create');
    Route::post('server-registration/store', [ServerController::class, 'store'])->name('server.store');
    Route::get('server/edit/{id}', [ServerController::class, 'edit'])->name('server.edit');
    Route::patch('server/edit/{id}/update', [ServerController::class, 'update'])->name('server.update');
    Route::get('server/{id}/show', [ServerController::class, 'show'])->name('server.show');
    Route::delete('server/{id}/delete', [ServerController::class, 'destroy'])->middleware(['password.confirm', 'verified'])->name('server.destroy');
});


require __DIR__.'/auth.php';
