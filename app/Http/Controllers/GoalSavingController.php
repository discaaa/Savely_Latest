<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use App\Models\SavingTransaction;
use App\Models\Activity;
use App\Services\ChallengeService;

class GoalSavingController extends Controller
{
    public function goalSaving()
    {
        $goals = Goal::where(
            'user_id',
            Auth::id()
        )->get();

        $transactions = SavingTransaction::with('goal')
            ->where(
                'user_id',
                Auth::id()
            )
            ->latest()
            ->get();

        $totalGoalSaving = Goal::where(
            'user_id',
            Auth::id()
        )->sum('current_amount');

        $topGoal = Goal::where(
            'user_id',
            Auth::id()
        )->orderByDesc('target_amount')
         ->first();

        $topPercentage = 0;

        if($topGoal && $topGoal->target_amount > 0){

            $topPercentage = round(

                ($topGoal->current_amount /

                $topGoal->target_amount) * 100

            );
        }

        return view(
            'saving.goalsave',
            compact(

                'goals',

                'transactions',

                'totalGoalSaving',

                'topGoal',

                'topPercentage'

            )
        );
    }
    public function history($id)
{
$goal = Goal::where(
'user_id',
Auth::id()
)->findOrFail($id);

$transactions = SavingTransaction::where(
    'goal_id',
    $goal->id
)
->latest()
->get();

return view(
    'saving.historysaving',
    compact(
        'goal',
        'transactions'
    )
);

}
}