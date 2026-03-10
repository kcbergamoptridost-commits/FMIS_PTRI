<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Budget;

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS (Admin + Staff)
|--------------------------------------------------------------------------
*/

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


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

        Route::middleware(['auth'])->group(function () {

    Route::get('/budget-summary', [BudgetController::class, 'summary'])
        ->name('budget.summary');

});

});

/*
|--------------------------------------------------------------------------
| STAFF MODULES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

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

    Route::get('/budget-summary', [BudgetController::class, 'summary'])
        ->name('budget.summary');

});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY MODULES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {

    // Budget management
    Route::get('budgets/{budget}/allocate',
        [BudgetController::class, 'allocateForm']
    )->name('budgets.allocate');

    Route::post('budgets/{budget}/allocate',
        [BudgetController::class, 'allocateStore']
    )->name('budgets.allocations.store');

    Route::resource('budgets', BudgetController::class);

    // Departments
    Route::resource('departments', DepartmentController::class);

    // Proposals
    Route::get('/proposals', [ProposalController::class, 'index'])
        ->name('proposals.index');

    // User Management (Admin creates staff accounts)
    Route::resource('users', UserController::class);

});

Route::get('/set-budget',[BudgetController::class,'setBudget'])
    ->name('budget.limit');

Route::post('/set-budget',[BudgetController::class,'storeBudget'])
    ->name('budget.limit.store');

Route::get('/set-budget', [BudgetController::class, 'setBudget'])->name('setBudget');

Route::post('/set-budget', [BudgetController::class, 'storeBudget'])->name('storeBudget');

require __DIR__.'/auth.php';