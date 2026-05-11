<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Reward;
use App\Models\Activity;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::all();

        $rewards = Reward::all();

        $activities = Activity::latest()->get();

        return view(
            'expense.index',
            compact(
                'challenges',
                'rewards',
                'activities'
            )
        );
    }
}