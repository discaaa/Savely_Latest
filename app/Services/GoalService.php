<?php

namespace App\Services;

use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalService
{
    public function getAllGoals()
    {
        return Goal::latest()->get();
    }

    public function createGoal($data)
    {
        return Goal::create([
            'user_id' => Auth::id(),

            'title' => $data['title'],

            'target_amount' => $data['target_amount'],

            'current_amount' => 0,

            'status' => 'ongoing'
        ]);
    }

    public function updateGoal($goal, $data)
    {
        return $goal->update([

            'title' => $data['title'],

            'target_amount' => $data['target_amount']
        ]);
    }

    public function deleteGoal($goal)
    {
        return $goal->delete();
    }
}