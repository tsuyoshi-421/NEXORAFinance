<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display the expenses page.
     */
        public function index()
    {
        $expenses = Procurement::select(
            'po_number',
            'category',
            'item',
            'qty',
            'uom',
            'amount',
            'delivery_status',
            'status',
            'created_at'
        )->get();

        // Total procurement expenses
        $procurementTotal = Procurement::sum('amount');

        // Total expenses of all departments
        // (For now procurement is the only table)
        $overallExpenses = $procurementTotal;

        // Percentage for the circle
        $procurementPercent = $overallExpenses > 0
            ? ($procurementTotal / $overallExpenses) * 100
            : 0;

        return view('expensesdash', compact(
            'expenses',
            'procurementTotal',
            'overallExpenses',
            'procurementPercent'
        ));
    }
}