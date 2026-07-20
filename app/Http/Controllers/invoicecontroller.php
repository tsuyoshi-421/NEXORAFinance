<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;

class InvoiceController extends Controller
{
    // Show dashboard
    public function index()
    {
$invoices = Invoice::with('order')
    ->latest('issue_date')
    ->get();
   
        $currentMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();

        // Current month's total invoice amount
        $currentTotal = Invoice::where('status', '!=', 'Rejected')
    ->whereYear('issue_date', $currentMonth->year)
    ->whereMonth('issue_date', $currentMonth->month)
    ->sum('invoice_amount');

        // Previous month's total invoice amount
        $lastTotal = Invoice::where('status', '!=', 'Rejected')
    ->whereYear('issue_date', $lastMonth->year)
    ->whereMonth('issue_date', $lastMonth->month)
    ->sum('invoice_amount');

        // Percentage change
        if ($lastTotal > 0) {
            $percent = (($currentTotal - $lastTotal) / $lastTotal) * 100;
        } else {
            $percent = $currentTotal > 0 ? 100 : 0;
        }
            $trend = $percent >= 0 ? '↑' : '↓';
            $color = $percent >= 0 ? 'text-emerald-400' : 'text-red-400';

                    // Current month's total paid amount
            $currentPaid = Invoice::where('status', 'Paid')
    ->whereYear('issue_date', $currentMonth->year)
    ->whereMonth('issue_date', $currentMonth->month)
    ->sum('paid_amount');

            // Previous month's total paid amount
            $lastPaid = Invoice::where('status', 'Paid')
    ->whereYear('issue_date', $lastMonth->year)
    ->whereMonth('issue_date', $lastMonth->month)
    ->sum('paid_amount');

            // Percentage change
            if ($lastPaid > 0) {
                $paidPercent = (($currentPaid - $lastPaid) / $lastPaid) * 100;
            } else {
                $paidPercent = $currentPaid > 0 ? 100 : 0;
            }

            $paidTrend = $paidPercent >= 0 ? '↑' : '↓';
            $paidColor = $paidPercent >= 0 ? 'text-emerald-400' : 'text-red-400';

                            // Current month's pending invoice amount
                $currentPending = Invoice::where('status', 'Pending')
                    ->whereYear('issue_date', $currentMonth->year)
                    ->whereMonth('issue_date', $currentMonth->month)
                    ->sum('invoice_amount');

                // Previous month's pending invoice amount
                $lastPending = Invoice::where('status', 'Pending')
                    ->whereYear('issue_date', $lastMonth->year)
                    ->whereMonth('issue_date', $lastMonth->month)
                    ->sum('invoice_amount');

                // Percentage change
                if ($lastPending > 0) {
                    $pendingPercent = (($currentPending - $lastPending) / $lastPending) * 100;
                } else {
                    $pendingPercent = $currentPending > 0 ? 100 : 0;
                }

                $pendingTrend = $pendingPercent >= 0 ? '↑' : '↓';
                $pendingColor = $pendingPercent >= 0 ? 'text-emerald-400' : 'text-red-400';

                // Current month's overdue invoice amount
                $currentOverdue = Invoice::where('due_date', '<', now())
    ->where('status', 'Pending')
    ->whereYear('issue_date', $currentMonth->year)
    ->whereMonth('issue_date', $currentMonth->month)
    ->get()
    ->sum(function ($invoice) {
        $subtotal = $invoice->invoice_amount;
        $discount = $invoice->discount;
        $shipping = $invoice->shipping_fee;

        $taxable = $subtotal - $discount + $shipping;
        $grandTotal = $taxable + ($taxable * 0.12);

        return $grandTotal - $invoice->paid_amount;
    });
                // Previous month's overdue invoice amount
                $lastOverdue = Invoice::where('due_date', '<', $lastMonth->copy()->endOfMonth())
    ->where('status', 'Pending')
    ->whereYear('issue_date', $lastMonth->year)
    ->whereMonth('issue_date', $lastMonth->month)
    ->get()
    ->sum(function ($invoice) {
        $subtotal = $invoice->invoice_amount;
        $discount = $invoice->discount;
        $shipping = $invoice->shipping_fee;

        $taxable = $subtotal - $discount + $shipping;
        $grandTotal = $taxable + ($taxable * 0.12);

        return $grandTotal - $invoice->paid_amount;
    });

                // Percentage change
                if ($lastOverdue > 0) {
                    $overduePercent = (($currentOverdue - $lastOverdue) / $lastOverdue) * 100;
                } else {
                    $overduePercent = $currentOverdue > 0 ? 100 : 0;
                }

                $overdueTrend = $overduePercent >= 0 ? '↑' : '↓';
                $overdueColor = $overduePercent >= 0 ? 'text-emerald-400' : 'text-red-400'; 

                return view('invoicedash', [
                    'invoices'      => $invoices,

                    'currentTotal'  => $currentTotal,
                    'lastTotal'     => $lastTotal,
                    'percent'       => round($percent, 1),
                    'trend'         => $trend,
                    'color'         => $color,

                    'currentPaid'   => $currentPaid,
                    'lastPaid'      => $lastPaid,
                    'paidPercent'   => round($paidPercent, 1),
                    'paidTrend'     => $paidTrend,
                    'paidColor'     => $paidColor,

                    'currentPending' => $currentPending,
                    'lastPending'    => $lastPending,
                    'pendingPercent' => round($pendingPercent, 1),
                    'pendingTrend'   => $pendingTrend,
                    'pendingColor'   => $pendingColor,  

                    'currentOverdue' => $currentOverdue,
                    'lastOverdue'    => $lastOverdue,
                    'overduePercent' => round($overduePercent, 1),
                    'overdueTrend'   => $overdueTrend,
                    'overdueColor'   => $overdueColor,  
                ]);
    }

    // Show one specific invoice
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('invoicedash', [
            'invoices' => collect([$invoice]),
        ]);
    }

    // Create a new invoice
    public function store(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|integer',
        'issue_date' => 'required|date',
        'due_date' => 'required|date',

        'invoice_amount' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'shipping_fee' => 'nullable|numeric',

        'paid_amount' => 'nullable|numeric',

        'payment_method' => 'nullable|string|max:30',
        'reference_number' => 'nullable|string|max:100',
        'payment_details' => 'nullable|string',

        'payment_status' => 'nullable|string|max:20',
        'status' => 'required|string|max:20',
    ]);

    Invoice::create([
        'client_id' => $validated['client_id'],
        'issue_date' => $validated['issue_date'],
        'due_date' => $validated['due_date'],

        'invoice_amount' => $validated['invoice_amount'],
        'discount' => $validated['discount'] ?? 0,
        'shipping_fee' => $validated['shipping_fee'] ?? 0,

        'paid_amount' => $validated['paid_amount'] ?? 0,

        'payment_method' => $validated['payment_method'] ?? null,
        'reference_number' => $validated['reference_number'] ?? null,
        'payment_details' => $validated['payment_details'] ?? null,

        'payment_status' => $validated['payment_status'] ?? 'Unpaid',
        'status' => $validated['status'],
    ]);

    return back()->with('success', 'Invoice created successfully.');
}

    // Update an invoice
    public function update(Request $request, Invoice $invoice)
{
    $request->validate([
        'invoice_amount' => 'required|numeric',
        'status' => 'required',
    ]);

    $invoice->update([
        'invoice_amount' => $request->invoice_amount,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success','Invoice updated.');
}

    // rejects an invoice
    public function reject(Invoice $invoice)
{
    $invoice->status = 'Rejected';
    $invoice->save();

    return response()->json([
        'success' => true
    ]);
}
    public function print($id)
{
    $invoice = Invoice::findOrFail($id);

    $subtotal = $invoice->invoice_amount;

    $discount = $invoice->discount;

    $shipping = $invoice->shipping_fee;

    $taxable = $subtotal - $discount + $shipping;

    $vat = $taxable * 0.12;

    $grandTotal = $taxable + $vat;

    $balanceDue = $grandTotal - $invoice->paid_amount;

    return view('print.invoice', compact(
        'invoice',
        'subtotal',
        'discount',
        'shipping',
        'taxable',
        'vat',
        'grandTotal',
        'balanceDue'
    ));
}
}
