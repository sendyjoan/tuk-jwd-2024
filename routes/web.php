<?php

use App\Livewire\AboutIndex;
use App\Livewire\CategoryIndex;
use App\Livewire\DashboardIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', DashboardIndex::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/about', AboutIndex::class)->middleware(['auth', 'verified'])->name('about');
Route::get('/categories', CategoryIndex::class)->middleware(['auth', 'verified'])->name('category');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
