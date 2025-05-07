<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ Import this

class PDFController extends Controller
{
    public function download($id)
    {
        $invoice = Invoice::with('user')->findOrFail($id);
        $pdf = Pdf::loadView('invoice', ['invoice' => $invoice]);
        return $pdf->download("invoice_{$invoice->id}.pdf");
    }
}
