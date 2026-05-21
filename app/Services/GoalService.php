<?php

namespace App\Services;

use App\Models\Goal;

class GoalService {
    public function getAllGoals() {
        return Goal::latest()->get();
    }

    public function createGoal($data) {
        return Goal::create([
            'user_id' => 1,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'target_amount' => $data['target_amount'],
            'current_amount' => 0,
            'deadline' => $data['deadline'],
            'status' => 'In Progress',
        ]);
    }

    public function updateGoal($goal, $data) {
        return $goal->update([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'target_amount' => $data['target_amount'],
            'deadline' => $data['deadline'],
        ]);
    }

    public function deleteGoal($goal) {
        return $goal->delete();
    }
}