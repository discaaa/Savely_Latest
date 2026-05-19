<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\SavingController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/expense', [ExpenseController::class, 'index'])
    ->name('expense.index');

Route::get('/expense/create', [ExpenseController::class, 'create'])
    ->name('expense.create');

Route::post('/expense/store', [ExpenseController::class, 'store'])
    ->name('expense.store');

Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])
    ->name('expense.edit');

Route::put('/expense/update/{id}', [ExpenseController::class, 'update'])
    ->name('expense.update');

Route::delete('/expense/delete/{id}', [ExpenseController::class, 'destroy'])
    ->name('expense.delete');

Route::get('/daily', [SavingController::class, 'index'])->name('saving.daily');
Route::get('/saving/create', [SavingController::class, 'create'])->name('saving.create');
Route::post('/saving/store', [SavingController::class, 'store'])->name('saving.store');

Route::view('/budget', 'budget.index')->name('budget');
Route::view('/budget/create', 'budget.create');
Route::view('/budget/detail', 'budget.detail');
Route::view('/budget/edit', 'budget.edit');
Route::view('/budget/historybudget', 'budget.historybudget');

Route::view('/saving', 'saving.daily')->name('saving');
Route::view('/goals', 'goals.index')->name('goals');

Route::view('/history', 'history.index')->name('history.index');

Route::get('/challenges', function () {
    return view('challenges.index');
})->name('challenges.index');