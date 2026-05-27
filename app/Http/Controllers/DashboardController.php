<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Goal;
use App\Models\UserChallenge;
use App\Models\Saving;

class DashboardController extends Controller
{
    public function index()
    {
        $totalExpense = Expense::where(
            'user_id', Auth::id()
        )->sum('amount');

        $totalSaving = Goal::where(
            'user_id', Auth::id()
        )->sum('current_amount');

        $activeChallenges = UserChallenge::where('status', 'ongoing')->count();

        $goals = Goal::where('user_id', Auth::id())
        ->latest()
        ->take(3)
        ->get();

        $recentExpenses = Expense::where(
            'user_id',
            Auth::id()
        )
        ->latest()
        ->take(3)
        ->get()
        ->map(function ($expense) {

            return [

                'type' =>
                    'expense',

                'title' =>
                    'Added ' .
                    $expense->category .
                    ' Expense',

                'date' =>
                    $expense->date,

            ];
        });

        $recentSavings = Saving::where(
            'user_id',
            Auth::id()
        )
        ->latest()
        ->take(3)
        ->get()
        ->map(function ($saving) {

            return [

                'type' =>
                    'saving',

                'title' =>
                    'Saving Added',

                'date' =>
                    $saving->date,

            ];
        });

        $recentActivities = $recentExpenses
            ->merge($recentSavings)
            ->sortByDesc('date')
            ->take(5);

        return view('dashboard.index', compact(
            'totalExpense',
            'totalSaving',
            'activeChallenges',
            'goals',
            'recentActivities'
        ));
    }
}