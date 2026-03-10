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
   $gms = Budget::where('program_name','GMS')->latest()->first();
    $hrd = Budget::where('program_name','HRD')->latest()->first();
    $rd  = Budget::where('program_name','RD')->latest()->first();
    $st  = Budget::where('program_name','ST')->latest()->first();
    $tt  = Budget::where('program_name','TT')->latest()->first();
    
    
    return view('budgets.index', compact('gms','hrd','rd','st','tt'));
}

    public function create()
    {
        return view('budgets.create');
    }

 public function store(Request $request)
{
    Budget::create([
        'program_name' => 'GMS',
        'ps' => $request->gms_ps,
        'mooe' => $request->gms_mooe,
        'co' => $request->gms_co
    ]);

    Budget::create([
        'program_name' => 'HRD',
        'ps' => $request->hrd_ps,
        'mooe' => $request->hrd_mooe,
        'co' => $request->hrd_co
    ]);

    Budget::create([
        'program_name' => 'RD',
        'ps' => $request->rd_ps,
        'mooe' => $request->rd_mooe,
        'co' => $request->rd_co
    ]);

    Budget::create([
        'program_name' => 'ST',
        'ps' => $request->st_ps,
        'mooe' => $request->st_mooe,
        'co' => $request->st_co
    ]);

    Budget::create([
        'program_name' => 'TT',
        'ps' => $request->tt_ps,
        'mooe' => $request->tt_mooe,
        'co' => $request->tt_co
    ]);

    return redirect()->route('budgets.index')->with('success','Budget saved successfully.');
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

 public function summary()
{
    $gms = Budget::where('program_name','GMS')->latest()->first();
    $hrd = Budget::where('program_name','HRD')->latest()->first();
    $rd  = Budget::where('program_name','RD')->latest()->first();
    $st  = Budget::where('program_name','ST')->latest()->first();
    $tt  = Budget::where('program_name','TT')->latest()->first();

    $totalPS = Budget::sum('ps');
    $totalMOOE = Budget::sum('mooe');
    $totalCO = Budget::sum('co');

    $totalBudget = $totalPS + $totalMOOE + $totalCO;

    return view('budgets.summary', compact(
        'gms',
        'hrd',
        'rd',
        'st',
        'tt',
        'totalPS',
        'totalMOOE',
        'totalCO',
        'totalBudget'
    ));
}
}