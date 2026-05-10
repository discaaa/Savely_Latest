<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/saving', function () {
    return view('saving.index');
})->name('saving');

Route::get('/goals', function () {
    return view('goals.index');
})->name('goals');

Route::get('/challenges', function () {
    return view('challenges.index');
})->name('challenges.index');

Route::get('/history', function () {
    return view('history.index');
})->name('history.index');