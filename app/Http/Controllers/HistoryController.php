<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Challenge;
use App\Models\Goal;
// use App\Models\Saving;
// use App\Models\SavingTransaction;

// Saving History and Expense only
class HistoryController extends Controller
{
    // public function index()
    // {
    //     $expenses = Expense::latest()->get();

    //     $savings = Saving::latest()->get();

    //     $transactions = SavingTransaction::latest()->get();

    //     return view('history.index', compact(
    //         'expenses',
    //         'savings',
    //         'transactions'
    //     ));
    // }
    public function index()
    {
        $expenses = Expense::latest()->get();

        $challenges = Challenge::latest()->get();

        $goals = Goal::latest()->get();

        return view(
            'history.index',
            compact(
                'expenses',
                'challenges',
                'goals'
            )
        );
    }
}