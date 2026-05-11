<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExpenseController;

Route::get('/expenses', [ExpenseController::class, 'index']);

Route::post('/expenses', [ExpenseController::class, 'store']);