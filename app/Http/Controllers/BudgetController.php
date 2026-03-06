<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Department;
use App\Models\BudgetDepartmentAllocation;
use Illuminate\Http\Request;

class BudgetController extends Controller
{

    public function index()
    {
        $budgets = Budget::all();
        return view('budgets.index', compact('budgets'));
    }

    public function create()
    {
        return view('budgets.create');
    }

 public function store(Request $request)
{
    Budget::create([
        'gms_ps' => $request->gms_ps,
        'gms_mooe' => $request->gms_mooe,
        'gms_co' => $request->gms_co,

        'hrd_ps' => $request->hrd_ps,
        'hrd_mooe' => $request->hrd_mooe,
        'hrd_co' => $request->hrd_co,

        'rd_ps' => $request->rd_ps,
        'rd_mooe' => $request->rd_mooe,
        'rd_co' => $request->rd_co,

        'st_ps' => $request->st_ps,
        'st_mooe' => $request->st_mooe,
        'st_co' => $request->st_co,

        'tt_ps' => $request->tt_ps,
        'tt_mooe' => $request->tt_mooe,
        'tt_co' => $request->tt_co,
    ]);

    return redirect()->route('budgets.index')->with('success', 'Budget saved successfully.');
}

   


        public function allocateForm($id)
        {
            $budget = Budget::findOrFail($id);

            $departments = Department::all();

            $allocations = BudgetDepartmentAllocation::where('budget_id', $id)
                ->with('department')
                ->get();

            $totalAllocated = $allocations->sum('allocated_amount');

            $remaining = $budget->total_amount - $totalAllocated;

            return view('budgets.allocate', compact(
                'budget',
                'departments',
                'allocations',
                'totalAllocated',
                'remaining'
            ));
        }


    public function allocateStore(Request $request, $id)
    {
        $request->validate([
            'department_id' => 'required',
            'allocated_amount' => 'required|numeric'
        ]);

        $budget = Budget::findOrFail($id);

        $totalAllocated = BudgetDepartmentAllocation::where('budget_id', $id)
            ->sum('allocated_amount');

        $remaining = $budget->total_amount - $totalAllocated;

        if ($request->allocated_amount > $remaining) {
            return redirect()->back()
                ->with('error', 'Allocation exceeds remaining budget.');
        }

        $balance = $remaining - $request->allocated_amount;

        BudgetDepartmentAllocation::create([
            'budget_id' => $id,
            'department_id' => $request->department_id,
            'allocated_amount' => $request->allocated_amount,
            'balance' => $balance
        ]);

        return redirect()->back()
            ->with('success', 'Department allocation added.');
    }


    public function show($id)
    {
        $budget = Budget::findOrFail($id);
        return view('budgets.show', compact('budget'));
    }


    public function edit($id)
    {
        $budget = Budget::findOrFail($id);
        return view('budgets.edit', compact('budget'));
    }


    public function update(Request $request, $id)
    {
        $budget = Budget::findOrFail($id);

        $budget->update($request->all());

        return redirect()->route('budgets.index')
            ->with('success', 'Budget updated successfully.');
    }


    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();

        return redirect()->route('budgets.index')
            ->with('success', 'Budget deleted.');
    }
}