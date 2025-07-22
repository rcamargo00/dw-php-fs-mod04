<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; // Importa el controlador
use Illuminate\Support\Facades\Route;

// ... otras rutas de Breeze

Route::get('/', function () {
    // return view('welcome'); 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas CRUD para productos, protegidas por el middleware 'auth'
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';