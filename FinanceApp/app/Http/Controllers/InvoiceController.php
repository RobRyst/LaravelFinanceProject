<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('user')->get();
        return response()->json($invoices);
    }

    public function getLastInvoices() {
        $latestInvoices = Invoice::with('user')
        ->latest('invoice_created')
        ->take(5)
        ->get();

        return Inertia::render('Dashboard', [
        'latestInvoices' => $latestInvoices,
        ]);
    }

    public function create() {
        return Inertia::render('Invoice/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:draft,sent,paid,overdue',
            'sub_total' => 'required|numeric',
            'discount' => 'required|numeric',
            'total' => 'required|numeric',
            'invoice_created' => 'required|date',
            'invoice_due_date' => 'required|date',
        ]);
    
        $invoice = Invoice::create($validated);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'total' => 'numeric',
            'invoice_due_date' => 'date',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($validated);

        return response()->json(['message' => 'Invoice updated successfully']);
    }

    public function destroy($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
            $invoice->delete();
    
            return response()->json(['message' => 'Invoice deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invoice not found or error deleting.'], 500);
        }
    }

    public function delete() {
        return Inertia::render('Invoice/Delete');
    }
}
