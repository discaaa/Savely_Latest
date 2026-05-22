<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\SavingTransaction;

class GoalSavingController extends Controller
{
    public function goalSaving()
    {
        $goals = Goal::all();

        $transactions = SavingTransaction::with('goal')
            ->latest()
            ->get();

        $totalGoalSaving = Goal::sum('current_amount');

        $topGoal = Goal::orderByDesc('target_amount')
            ->first();

        $topPercentage = 0;

        if($topGoal && $topGoal->target_amount > 0){

            $topPercentage = round(
                ($topGoal->current_amount /
                $topGoal->target_amount) * 100
            );
        }

        return view('saving.goalsave', compact(
            'goals',
            'transactions',
            'totalGoalSaving',
            'topGoal',
            'topPercentage'
        ));
    }
}