<?php

namespace App\Http\Controllers;

use App\Models\Budget;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAllotment = Budget::sum('amount');

        return view('dashboard', compact('totalAllotment'));

{
        $totalBudget = Budget::sum('total_amount');

        return view('dashboard', compact('totalBudget'));
    }
    }

    
}