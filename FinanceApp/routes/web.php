<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PDFController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });
    */
    Route::get('/dashboard', [InvoiceController::class, 'getLastInvoices'])
        ->middleware(['auth', 'verified'])->name('dashboard');

    //BRUK DENNE TIL Å REDIRECTE
    //Route::get('register', [InvoiceController::class, 'getLastInvoices'])
      //  ->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::get('/', [InvoiceController::class, 'getLastInvoices'])
    ->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/invoicePage', function () {
        return Inertia::render('Invoice/Invoices');
    })->middleware(['auth', 'verified'])->name('invoicePage');

    Route::get('/transactionPage', function () {
        return Inertia::render('Transaction/Transactions');
    })->middleware(['auth', 'verified'])->name('transactionPage');

    Route::get('/billPage', function () {
        return Inertia::render('Bill/Bills');
    })->middleware(['auth', 'verified'])->name('billPage');

    Route::get('/potsPage', function () {
        return Inertia::render('Pots/Pots');
    })->middleware(['auth', 'verified'])->name('potsPage');

    Route::get('/budgetPage', function () {
        return Inertia::render('Budget/Budgets');
    })->middleware(['auth', 'verified'])->name('budgetPage');

    Route::middleware('auth:sanctum')->group(function () {
    Route::put('/invoices/{id}', [InvoiceController::class, 'update']);
});
    
    
    Route::get('/invoices/{id}/download', [PDFController::class, 'download']);

    Route::get('/invoice/create', [InvoiceController::class, 'create'])
    ->name('invoice.create');
    
    Route::post('/invoice', [InvoiceController::class, 'store'])
    ->name('invoice.store');
    
    Route::get('/invoices', [InvoiceController::class, 'index']);
    
    Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy']);

});
    //Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    //Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

require __DIR__.'/auth.php';
