<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\UserPoint;
use App\Models\RewardClaim;
use App\Models\Activity;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::latest()->get();

        $userPoints = UserPoint::where(
            'user_id',
            auth()->id()
        )->first();

        $totalPoints =
            $userPoints->points ?? 0;

        $claimedRewards = RewardClaim::where(
            'user_id',
            auth()->id()
        )
        ->with('reward')
        ->latest()
        ->get();

        return view(
            'rewards.index',
            compact(
                'rewards',
                'totalPoints',
                'claimedRewards'
            )
        );
    }

    public function claim($id)
    {
        $reward = Reward::findOrFail($id);

        $userPoint = UserPoint::firstOrCreate(

            [
                'user_id' => auth()->id()
            ],

            [
                'points' => 0
            ]
        );

        if (
            $userPoint->points
            <
            $reward->price_points
        ) {

            return back()->with(

                'error',
                'Not enough points.'

            );
        }

        $userPoint->points -=
            $reward->price_points;

        $userPoint->save();

        RewardClaim::create([

            'user_id' =>
                auth()->id(),

            'reward_id' =>
                $reward->id

        ]);

        Activity::create([

            'title' =>
                'Reward Claimed',

            'description' =>
                'You claimed reward: '
                . $reward->name

        ]);

        return back()->with(

            'success',
            'Reward claimed successfully.'

        );
    }
}