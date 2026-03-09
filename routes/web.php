<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;
use App\Models\Budget;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {

        $totalPS = Budget::sum('ps');
        $totalMOOE = Budget::sum('mooe');
        $totalCO = Budget::sum('co');

        $totalBudget = $totalPS + $totalMOOE + $totalCO;
        $totalAppropriation = $totalBudget;

        return view('dashboard', compact(
            'totalPS',
            'totalMOOE',
            'totalCO',
            'totalBudget',
            'totalAppropriation'
        ));

    })->name('dashboard');


    // Budget allocation
    Route::get('budgets/{budget}/allocate',
        [BudgetController::class, 'allocateForm']
    )->name('budgets.allocate');

    Route::post('budgets/{budget}/allocate',
        [BudgetController::class, 'allocateStore']
    )->name('budgets.allocations.store');


    // Budget resource
    Route::resource('budgets', BudgetController::class);


    // Department resource
    Route::resource('departments', DepartmentController::class);


    // Proposals
    Route::get('/proposals', [ProposalController::class, 'index'])
        ->name('proposals.index');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';