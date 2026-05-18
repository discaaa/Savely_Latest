<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/expense', function () {
    return view('expense.index');
})->name('expense.index');

Route::get('/expense/create', function () {
    return view('expense.create');
})->name('expense.create');

Route::get('/expense/edit', function () {
    return view('expense.edit');
})->name('expense.edit');

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