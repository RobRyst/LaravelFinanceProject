<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index() {
        return Inertia::render('Budget/Index');
    }
}
