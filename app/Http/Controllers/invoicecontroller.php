<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    // Show dashboard
    public function index()
    {
        // All invoices for the table
        $invoices = Invoice::latest('issue_date')->get();

        $currentMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();

        // Current month's total invoice amount
        $currentTotal = Invoice::whereYear('issue_date', $currentMonth->year)
            ->whereMonth('issue_date', $currentMonth->month)
            ->sum('invoice_amount');

        // Previous month's total invoice amount
        $lastTotal = Invoice::whereYear('issue_date', $lastMonth->year)
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
            $currentPaid = Invoice::whereYear('issue_date', $currentMonth->year)
                ->whereMonth('issue_date', $currentMonth->month)
                ->sum('paid_amount');

            // Previous month's total paid amount
            $lastPaid = Invoice::whereYear('issue_date', $lastMonth->year)
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
                    ->where('status', 'Pending') // Change if your unpaid status is different
                    ->whereYear('issue_date', $currentMonth->year)
                    ->whereMonth('issue_date', $currentMonth->month)
                    ->sum('outstanding_amount');

                // Previous month's overdue invoice amount
                $lastOverdue = Invoice::where('due_date', '<', $lastMonth->copy()->endOfMonth())
                    ->where('status', 'Pending')
                    ->whereYear('issue_date', $lastMonth->year)
                    ->whereMonth('issue_date', $lastMonth->month)
                    ->sum('outstanding_amount');

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
    public function store()
    {
        Invoice::create([
            'client_id'          => 1,
            'issue_date'         => now(),
            'due_date'           => '2025-08-01',
            'invoice_amount'     => 900000,
            'paid_amount'        => 10000,
            'outstanding_amount' => 890000,
            'status'             => 'Draft',
        ]);

        return back()->with('success', 'Invoice created successfully.');
    }

    // Update an invoice
    public function update($id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->update([
            'invoice_amount' => 1000000,
        ]);

        return back()->with('success', 'Invoice updated successfully.');
    }

    // Delete an invoice
    public function destroy($id)
    {
        Invoice::destroy($id);

        return back()->with('success', 'Invoice deleted successfully.');
    }
}
