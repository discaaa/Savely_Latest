<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\UserChallenge;
use App\Models\Reward;
use App\Models\Activity;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = UserChallenge::with('challenge')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();


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