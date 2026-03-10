<?php

namespace App\Http\Controllers;

use App\Models\Budget;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total allotment
        $totalBudget = Budget::sum('amount');

        // Get FY 2026 budget entered by admin
        $budget2026 = Budget::where('fiscal_year', 2026)->first();

        $totalAppropriation = $budget2026 ? $budget2026->amount : 0;

        return view('dashboard', compact(
            'totalBudget',
            'totalAppropriation'
        ));
    }
}