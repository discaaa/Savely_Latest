<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Challenge;
use App\Models\Reward;
use App\Models\Activity;
use App\Models\UserPoint;
use App\Models\PointLog;
use App\Models\UserChallenge;

use App\Services\ChallengeService;

class ChallengeController extends Controller
{
    public function index()
    {
        ChallengeService::initializeChallenges(
            Auth::user()
        );

        $dailyChallenges = Challenge::with([
            'userChallenges' => function ($query) {

                $query->where(
                    'user_id',
                    Auth::id()
                )
                ->whereDate(
                    'challenge_date',
                    today()
                );
            }
        ])
        ->where(
            'duration_type',
            'daily'
        )
        ->whereIn(
            'id',
            function($query){

                $query->select('challenge_id')
                    ->from('user_challenges')
                    ->where(
                        'user_id',
                        Auth::id()
                    )
                    ->whereDate(
                        'challenge_date',
                        today()
                    );
            }
        )
        ->take(3)
        ->get();

        $weeklyChallenges = Challenge::with([
            'userChallenges' => function ($query) {

                $query->where(
                    'user_id',
                    Auth::id()
                )->whereDate(
                    'challenge_date', '>=', now()->startOfWeek()
                );
            }
        ])
        ->where(
            'duration_type',
            'weekly'
        )
        ->whereIn(
            'id',
            function($query){

                $query->select('challenge_id')
                    ->from('user_challenges')
                    ->where(
                        'user_id',
                        Auth::id()
                    )
                    ->whereDate(
                        'challenge_date',
                        '>=',
                        now()->startOfWeek()
                    );
            }
        )
        ->take(3)
        ->get();

        $achievementChallenges = Challenge::with([
            'userChallenges' => function ($query) {

                $query->where(
                    'user_id',
                    Auth::id()
                );
            }
        ])
        ->where(
            'duration_type',
            'achievement'
        )
        ->get();

        $userPoints = UserPoint::firstOrCreate(
            [
                'user_id' => Auth::id()
            ],
            [
                'points' => 0
            ]
        );

        $activities = Activity::latest()->take(10)->get();

        $currentStreak = UserChallenge::where(
            'user_id',
            Auth::id()
        )
        ->where(
            'status',
            'completed'
        )
        ->whereDate(
            'challenge_date',
            today()
        )
        ->count();

        $activeCount = UserChallenge::where(
            'user_id',
            Auth::id()
        )
        ->where(
            'status',
            'ongoing'
        )
        ->where(function($query){
            $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
        })
        ->count();

        $completedCount = UserChallenge::where(
            'user_id',
            Auth::id()
        )
        ->where(
            'status',
            'completed'
        )
        ->where(function($query){
            $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
        })
        ->count();

        return view(
            'challenges.index',
            compact(
                'dailyChallenges',
                'weeklyChallenges',
                'achievementChallenges',
                'activities',
                'userPoints',
                'currentStreak',
                'activeCount',
                'completedCount'
            )
        );
    }

    public function claim($id)
    {
        try {

            $challenge = Challenge::findOrFail($id);

            DB::transaction(function () use ($challenge) {

                $userChallenge = UserChallenge::where(
                    'user_id',
                    Auth::id()
                )
                ->where(
                    'challenge_id',
                    $challenge->id
                )
                ->where(function ($query){
                    $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
                })
                ->latest()
                ->lockForUpdate()
                ->first();

                if (
                    !$userChallenge ||
                    $userChallenge->status != 'completed'
                ) {

                    throw new \Exception(
                        'Challenge is not completed yet.'
                    );
                }

                if ($userChallenge->reward_claimed) {

                    throw new \Exception(
                        'Reward already claimed.'
                    );
                }

                $userPoint = UserPoint::firstOrCreate(
                    [
                        'user_id' => Auth::id()
                    ],
                    [
                        'points' => 0
                    ]
                );

                $userPoint->increment(
                    'points',
                    $challenge->reward_points
                );

                $userChallenge->update([
                    'reward_claimed' => true
                ]);
                if ($challenge->duration_type == 'achievement') {

                    $userChallenge->delete();

                    ChallengeService::initializeChallenges(
                        Auth::user()
                    );
                }

                PointLog::create([
                    'user_id' => Auth::id(),
                    'points' => $challenge->reward_points,
                    'type' => 'challenge_reward',
                    'description' =>
                        'Claimed reward from '
                        . $challenge->title
                ]);

                Activity::create([

                    'title' => 'Reward Claimed',

                    'description' =>
                        'Claimed reward from '
                        . $challenge->title
                ]);
            });

            return back()->with(
                'success',
                'Reward claimed successfully!'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }
}