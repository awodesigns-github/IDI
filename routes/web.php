<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
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
});

// Application Routes
Route::get('application', [ApplicationController::class, 'index'])->name('application.index');
Route::get('application-registration', [ApplicationController::class, 'create'])->name('application.create');
Route::post('application-registration', [ApplicationController::class, 'store'])->name('application.store');
Route::get('application/edit/{id}', [ApplicationController::class, 'edit'])->name('application.edit');
Route::patch('application/edit/{id}', [ApplicationController::class, 'update'])->name('application.update');
Route::get('application/{id}', [ApplicationController::class, 'show'])->name('application.show');
Route::delete('application/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy');


require __DIR__.'/auth.php';
