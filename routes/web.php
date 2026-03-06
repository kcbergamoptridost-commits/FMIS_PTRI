<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Models\Budget;
use App\Http\Controllers\ProposalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $totalBudget = \App\Models\Budget::sum('ps')
        + \App\Models\Budget::sum('mooe')
        + \App\Models\Budget::sum('co');

    return view('dashboard', compact('totalBudget'));

})->middleware(['auth'])->name('dashboard');

    // Allocation routes
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

    // Profile routes


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals.index');

});


require __DIR__.'/auth.php';