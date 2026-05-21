<?php

namespace App\Http\Controllers;

use App\Services\GoalSavingService;

class GoalSavingController extends Controller
{
    protected $goalSavingService;

    public function __construct(
        GoalSavingService $goalSavingService
    ) {
        $this->goalSavingService = $goalSavingService;
    }

    public function index()
    {
        $goals = $this->goalSavingService
            ->getGoalSavings();

        return view('saving.goalsave', compact('goals'));
    }

    public function show($id)
    {
        $goal = $this->goalSavingService
            ->getGoalDetail($id);

        return view('saving.detail', compact('goal'));
    }
}