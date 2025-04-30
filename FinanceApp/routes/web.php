<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/transaction', [InvoiceController::class, 'index'])
    ->name('transaction');

Route::get('/budget', [InvoiceController::class, 'index'])
    ->name('budget');

Route::get('/pot', [InvoiceController::class, 'index'])
    ->name('pot');

Route::get('bill', [InvoiceController::class, 'index'])
    ->name('bill');

Route::get('/invoice', [InvoiceController::class, 'index'])
    ->name('invoice');

Route::get('/invoice/create', [InvoiceController::class, 'create'])
    ->name('invoice');

Route::get('/invoice/update', [InvoiceController::class, 'update'])
    ->name('invoice');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
