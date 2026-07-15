<?php

namespace App\Http\Controllers;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    // Show all invoices
    public function index()
    {
        $invoices = Invoice::all();   // use plural here

        return view('invoicedash', compact('invoices')); 
    }

    // Show one specific invoice
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        // wrap single record in an array so the view always gets $invoices
        return view('invoicedash', ['invoices' => [$invoice]]);
    }


    // Create a new invoice
    public function store()
    {
        Invoice::create([
            'client_id' => 1,
            'issue_date' => now(),
            'due_date' => '2025-08-01',
            'invoice_amount' => 900000,
            'paid_amount' => 10000,
            'outstanding_amount' =>9000,
            'status' => 'Draft',
        ]);

        return "Invoice created!";
    }


    // Update an invoice
    public function update($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->update([
            'invoice_amount' => 1000000
        ]);

        return "Invoice updated!";
    }


    // Delete an invoice
    public function destroy($id)
    {
        Invoice::destroy($id);

        return "Invoice deleted!";
    }
}