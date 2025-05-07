<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/invoices', [InvoiceController::class, 'index']);
Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy']);

Route::get('/users', function () {
    return \App\Models\User::select('id', 'firstname', 'lastname')->get();
});