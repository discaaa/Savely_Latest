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
})->name('expense');

Route::get('/goals', function () {
    return view('goals.index');
})->name('goals');

Route::get('/history', function () {
    return view('history.index');
})->name('history');