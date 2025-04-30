<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PotsController extends Controller
{
    public function index() {
        return Inertia::render('Pot/Index');
    }
}
