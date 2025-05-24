<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoController::class)->middleware('auth');
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index')->middleware('auth');
    Route::patch('/todos/{todo}/status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus')->middleware('auth');
    Route::post('/todos', [TodoController::class, 'store'])->middleware('auth')->name('todos.store');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::resource('todos', TodoController::class);
    Route::patch('/todos/{id}/status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');
    Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
