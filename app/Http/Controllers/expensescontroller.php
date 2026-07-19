<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExpensesController extends Controller
{
    /**
     * Display the expenses page.
     */
        public function index()
    {   
        $range = request()->get('range', '6months');
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
        $procurementTotal = Procurement::selectRaw('SUM(qty * amount) as total')
    ->value('total');

        // Total expenses of all departments
        // (For now procurement is the only table)
        $overallExpenses = $procurementTotal;

        // Percentage for the circle
        $procurementPercent = $overallExpenses > 0
            ? ($procurementTotal / $overallExpenses) * 100
            : 0;
        // Monthly Procurement Totals
        switch ($range) {

    case 'week':

        $monthlyProcurement = Procurement::selectRaw("
            TO_CHAR(order_date, 'Dy') AS month,
            SUM(qty * amount) AS total
        ")
        ->where('order_date', '>=', now()->subDays(6))
        ->groupByRaw("TO_CHAR(order_date, 'Dy')")
        ->orderByRaw("MIN(order_date)")
        ->get();

        break;

    case 'month':

        $monthlyProcurement = Procurement::selectRaw("
            CONCAT('Week ', EXTRACT(WEEK FROM order_date)::int) AS month,
            SUM(qty * amount) AS total
        ")
        ->where('order_date', '>=', now()->subMonth())
        ->groupByRaw("EXTRACT(WEEK FROM order_date)")
        ->orderByRaw("EXTRACT(WEEK FROM order_date)")
        ->get();

        break;

    case 'year':

        $monthlyProcurement = Procurement::selectRaw("
            TO_CHAR(order_date, 'Mon') AS month,
            SUM(qty * amount) AS total
        ")
        ->where('order_date', '>=', now()->subYear())
        ->groupByRaw("EXTRACT(MONTH FROM order_date), TO_CHAR(order_date, 'Mon')")
        ->orderByRaw("EXTRACT(MONTH FROM order_date)")
        ->get();

        break;

    default: // 6 months

        $monthlyProcurement = Procurement::selectRaw("
            TO_CHAR(order_date, 'YYYY-MM') AS month,
            SUM(qty * amount) AS total
        ")
        ->where('order_date', '>=', now()->subMonths(6))
        ->groupByRaw("TO_CHAR(order_date, 'YYYY-MM')")
        ->orderByRaw("MIN(order_date)")
        ->get();

        break;
}
        $labels = [];
            $totals = [];

            foreach ($monthlyProcurement as $row) {
                $labels[] = $row->month;   // e.g. "2026-02"
                $totals[] = (float) $row->total;
            }
        return view('expensesdash', compact(
            'expenses',
            'procurementTotal',
            'overallExpenses',
            'procurementPercent',
            'labels',
            'totals',
            'range'
        ));
    }
}