<?php

namespace App\Services;

use App\Models\Goal;

class GoalSavingService {
    public function getGoalSavings() {
        return Goal::with('transactions')
            ->latest()
            ->get();
    }

    public function getGoalDetail($id) {
        return Goal::with('transactions')
            ->findOrFail($id);
    }
}