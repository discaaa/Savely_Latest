<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;

Route::get('/', function () {
    return view('welcome');
});

/* DASHBOARD */
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

/* EXPENSE */
Route::get('/expense', function () {
    return view('expense.index');
})->name('expense.index');

Route::get('/expense/create', function () {
    return view('expense.create');
})->name('expense.create');

Route::get('/expense/edit', function () {
    return view('expense.edit');
})->name('expense.edit');

/* SAVING */
Route::get('/saving', function () {
    return view('saving.index');
})->name('saving');

/* GOALS */
Route::get('/goals', function () {
    return view('goals.index');
})->name('goals');

/* HISTORY */
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