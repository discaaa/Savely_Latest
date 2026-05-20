<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Saving;
use App\Models\Goal;
use App\Models\Challenge;

class DashboardController extends Controller
{
    public function index()
    {
        $totalExpense = Expense::sum('amount');
        $totalSaving = Saving::sum('amount');

        $totalGoal = Goal::sum('target_amount');

        $savingProgress = $totalGoal > 0
            ? round(($totalSaving / $totalGoal) * 100)
            : 0;

        $activeChallenges = Challenge::count();

        $recentExpenses = Expense::latest()->take(3)->get()->map(function ($e) {
            return [
                'type' => 'expense',
                'title' => 'Added ' . $e->category . ' Expense',
                'date' => $e->date,
            ];
        });

        $recentSavings = Saving::latest()->take(3)->get()->map(function ($s) {
            return [
                'type' => 'saving',
                'title' => 'Saving Added',
                'date' => $s->date,
            ];
        });

        $recentActivities = $recentExpenses
            ->merge($recentSavings)
            ->sortByDesc('date')
            ->take(5);

        return view('dashboard.index', compact(
            'totalExpense',
            'totalSaving',
            'savingProgress',
            'activeChallenges',
            'recentActivities'
        ));
    }
}