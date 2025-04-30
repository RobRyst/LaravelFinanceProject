<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function index() {
        return Inertia::render('Invoice/Index');
    }

    public function create() {
        return Inertia::render('Invoice/Create');
    }

    public function read() {
        
    }

    public function update() {
        return Inertia::render('Invoice/Update');
    }

    public function delete() {
        return Inertia::render('Invoice/Delete');
    }
}
