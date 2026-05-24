<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Challenge;
use App\Models\Reward;
use App\Models\Activity;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::latest()->get();

        $rewards = Reward::all();

        $activities = Activity::latest()->get();

        return view(
            'challenges.index',
            compact(
                'challenges',
                'rewards',
                'activities'
            )
        );
    }
}