<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DailySavingController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\GoalSavingController;
use App\Http\Controllers\SavingTransactionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController;

Route::view('/home', 'landing.home')
    ->name('home');

Route::view('/features', 'landing.features')
    ->name('features');

Route::view('/aboutus', 'landing.aboutus')
    ->name('aboutus');

Route::view('/faq', 'landing.faq')
    ->name('faq');

// Auth
Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login/store', [AuthController::class, 'loginStore'])
    ->name('login.store');

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register/store', [AuthController::class, 'registerStore'])
    ->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    // Dashboard
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

    Route::prefix('saving')->group(function () {
        // Daily Saving
        Route::get('/', [DailySavingController::class, 'index'])
            ->name('saving.daily');

        // Goal Saving
        Route::get('/goalsave', [GoalSavingController::class, 'goalSaving'])
            ->name('saving.goalsave');

        // CRUD Daily Saving
        Route::get('/create', [DailySavingController::class, 'create'])
            ->name('saving.create');

        Route::post('/store', [DailySavingController::class, 'store'])
            ->name('saving.store');

        Route::get('/detail/{id}', [DailySavingController::class, 'show'])
            ->name('saving.detail');

        Route::get('/edit/{id}', [DailySavingController::class, 'edit'])
            ->name('saving.edit');

        Route::put('/update/{id}', [DailySavingController::class, 'update'])
            ->name('saving.update');

        Route::delete('/delete/{id}', [DailySavingController::class, 'destroy'])
            ->name('saving.destroy');

        // Saving History
        Route::get('/history', [DailySavingController::class, 'history'])
            ->name('saving.history');
    });

    Route::prefix('goals')->group(function () {

        Route::get('/', [GoalController::class, 'index'])
            ->name('goals.index');

        Route::get('/create', [GoalController::class, 'create'])
            ->name('goals.create');

        Route::post('/store', [GoalController::class, 'store'])
            ->name('goals.store');

        Route::get('/detail/{id}', [GoalController::class, 'show'])
            ->name('goals.detail');

        Route::get('/edit/{id}', [GoalController::class, 'edit'])
            ->name('goals.edit');

        Route::put('/update/{id}', [GoalController::class, 'update'])
            ->name('goals.update');

        Route::delete('/delete/{id}', [GoalController::class, 'destroy'])
            ->name('goals.destroy');

        Route::get('/history', [GoalController::class, 'history'])
            ->name('goals.history');
    });

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

});
