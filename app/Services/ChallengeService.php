<?php

namespace App\Services;

use App\Models\Challenge;
use App\Models\UserChallenge;
use App\Models\UserPoint;
use App\Models\Activity;

class ChallengeService
{
    public static function updateSavingChallenge($user, $amount)
    {
        $challenges = Challenge::where(
            'type',
            'saving_streak'
        )->get();

        foreach ($challenges as $challenge) {

            $userChallenge = UserChallenge::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'challenge_id' => $challenge->id,
                ],
                [
                    'progress' => 0,
                    'status' => 'ongoing'
                ]
            );

            if ($userChallenge->status == 'completed') {
                continue;
            }

            $userChallenge->progress += $amount;

            if ($userChallenge->progress >= $challenge->target) {

                $userChallenge->progress =
                    $challenge->target;

                $userChallenge->status = 'completed';

                Activity::create([
                    'title' => 'Challenge Completed',
                    'description' =>
                        'You completed the challenge: '
                        . $challenge->title
                ]);
            }

            $userChallenge->save();
        }
    }

    public static function completeGoalChallenge($user)
    {
        $challenges = Challenge::where(
            'type',
            'goal_complete'
        )->get();

        foreach ($challenges as $challenge) {

            $userChallenge = UserChallenge::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'challenge_id' => $challenge->id,
                ],
                [
                    'progress' => 0,
                    'status' => 'ongoing'
                ]
            );

            if ($userChallenge->status == 'completed') {
                continue;
            }

            $userChallenge->progress += 1;

            if ($userChallenge->progress >= $challenge->target) {

                $userChallenge->progress =
                    $challenge->target;

                $userChallenge->status = 'completed';

                Activity::create([
                    'title' => 'Goal Completed',
                    'description' =>
                        'You completed your saving goal.'
                ]);
            }

            $userChallenge->save();
        }
    }

    public static function updateBudgetChallenge($user)
    {
        $budgets = Budget::where(
            'user_id',
            $user->id
        )->get();

        foreach ($budgets as $budget) {

            $challenges = UserChallenge::where(
                'user_id',
                $user->id
            )
            ->where('status', 'ongoing')
            ->whereHas('challenge', function ($query) {

                $query->where(
                    'type',
                    'budget_control'
                );

            })
            ->get();

            foreach ($challenges as $userChallenge) {

                if (
                    $budget->spent
                    >
                    $budget->limit_amount
                ) {

                    $userChallenge->status =
                        'failed';

                    $userChallenge->save();

                    continue;
                }

                $userChallenge->progress += 1;

                if (
                    $userChallenge->progress
                    >=
                    $userChallenge->challenge->target
                ) {

                    $userChallenge->progress =
                        $userChallenge->challenge->target;

                    $userChallenge->status =
                        'completed';

                }

                $userChallenge->save();
            }
        }
    }   

    public static function giveRewardPoints($userId, $points)
    {
        $userPoint = UserPoint::firstOrCreate(
            ['user_id' => $userId],
            ['points' => 0]
        );

        $userPoint->points += $points;

        $userPoint->save();
    }

    public static function initializeChallenges($user)
    {
        UserChallenge::where(
            'user_id',
            $user->id
        )
        ->whereNotNull('expires_at')
        ->where(
            'expires_at',
            '<',
            now()
        )
        ->delete();

        $dailyCount = UserChallenge::where(
            'user_id',
            $user->id
        )
        ->whereHas('challenge', function ($query) {

            $query->where(
                'duration_type',
                'daily'
            );

        })
        ->count();

        if ($dailyCount < 3) {

            $dailyChallenges = Challenge::where(
                'duration_type',
                'daily'
            )
            ->inRandomOrder()
            ->take(3 - $dailyCount)
            ->get();

            foreach ($dailyChallenges as $challenge) {

                UserChallenge::create([

                    'user_id' => $user->id,

                    'challenge_id' => $challenge->id,

                    'challenge_date' => today(),

                    'expires_at' => now()->addDay(),

                    'progress' => 0,

                    'status' => 'ongoing',

                    'reward_claimed' => false

                ]);
            }
        }

        $weeklyCount = UserChallenge::where(
            'user_id',
            $user->id
        )
        ->whereHas('challenge', function ($query) {

            $query->where(
                'duration_type',
                'weekly'
            );

        })
        ->count();

        if ($weeklyCount < 3) {

            $weeklyChallenges = Challenge::where(
                'duration_type',
                'weekly'
            )
            ->inRandomOrder()
            ->take(3 - $weeklyCount)
            ->get();

            foreach ($weeklyChallenges as $challenge) {

                UserChallenge::create([

                    'user_id' => $user->id,

                    'challenge_id' => $challenge->id,

                    'challenge_date' => today(),

                    'expires_at' => now()->addDays(7),

                    'progress' => 0,

                    'status' => 'ongoing',

                    'reward_claimed' => false

                ]);
            }
        }

        $achievementCount = UserChallenge::where(
            'user_id',
            $user->id
        )
        ->whereHas('challenge', function ($query) {

            $query->where(
                'duration_type',
                'achievement'
            );

        })
        ->count();

        if ($achievementCount < 3) {

            $achievementChallenges = Challenge::where(
                'duration_type',
                'achievement'
            )
            ->inRandomOrder()
            ->take(3 - $achievementCount)
            ->get();

            foreach ($achievementChallenges as $challenge) {

                UserChallenge::create([

                    'user_id' => $user->id,

                    'challenge_id' => $challenge->id,

                    'challenge_date' => today(),

                    'expires_at' => null,

                    'progress' => 0,

                    'status' => 'ongoing',

                    'reward_claimed' => false

                ]);
            }
        }        
    }
    
    public static function updateExpenseChallenge($user)
    {
        $challenges = UserChallenge::where(
            'user_id',
            $user->id
        )
        ->where('status', 'ongoing')
        ->whereHas('challenge', function ($query) {

            $query->where(
                'type',
                'expense_tracking'
            );

        })
        ->get();

        foreach ($challenges as $userChallenge) {

            $userChallenge->progress += 1;

            if (
                $userChallenge->progress
                >=
                $userChallenge->challenge->target
            ) {

                $userChallenge->progress =
                    $userChallenge->challenge->target;

                $userChallenge->status =
                    'completed';

                Activity::create([

                    'title' => 'Challenge Completed',

                    'description' =>
                        'Completed challenge: '
                        . $userChallenge->challenge->title

                ]);
            }

            $userChallenge->save();
        }
    }    

    public static function failNoSpendChallenge($user)
    {
        $challenges = UserChallenge::where(
            'user_id',
            $user->id
        )
        ->where('status', 'ongoing')
        ->whereHas('challenge', function ($query) {

            $query->where(
                'type',
                'no_spend'
            );

        })
        ->get();

        foreach ($challenges as $userChallenge) {

            $userChallenge->status = 'failed';

            $userChallenge->save();

        }
    }

}