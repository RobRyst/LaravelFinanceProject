<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index() {
        return Inertia::render('Bill/Index');
    }
}
