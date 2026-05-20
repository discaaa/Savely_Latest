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

Route::get('/budget', function () {
    return view('budget.index');
})->name('budget');

Route::view('/budget/create', 'budget.create');
Route::view('/budget/detail', 'budget.detail');
Route::view('/budget/edit', 'budget.edit');
Route::view('/budget/historybudget', 'budget.historybudget');

Route::get('/saving', function () {
    return view('saving.daily');
})->name('saving');

Route::view('/goalsave', 'saving.goalsave');
Route::view('/daily', 'saving.daily');
Route::view('saving/newsaving', 'saving.newsaving');
Route::view('saving/detail', 'saving.detail');
Route::view('saving/edit', 'saving.edit');
Route::view('saving/historysaving', 'saving.historysaving');

Route::get('/goals', function () {
    return view('goals.index');
})->name('goals');

Route::view('/goals/create', 'goals.create');
Route::view('/goals/detail', 'goals.detail');
Route::view('/goals/edit', 'goals.edit');
Route::view('/goals/historygoals', 'goals.historygoals');

Route::get('/history', function () {
    return view('history.index');
})->name('history.index');

/* EXPENSE TEST */
Route::get('/expense-test', function () {
    return view('expense.create');
});

/* CHALLENGES */
Route::get('/challenges', function () {
    return view('challenges.index');
})->name('challenges.index');