@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .summary-card{
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        height: 100%;
    }

    .challenge-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        transition: 0.3s;
        height: 100%;
    }

    .challenge-card:hover{
        transform: translateY(-3px);
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .summary-title{
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .summary-value{
        font-size: 34px;
        font-weight: 800;
        color: #111827;
    }

    .challenge-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .completed-badge{
        background: #dcfce7;
        color: #166534;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .notstarted-badge{
        background: #e5e7eb;
        color: #374151;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .progress{
        border-radius: 999px;
        background: #ede9fe;
        overflow: hidden;
        height: 18px;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #a855f7
        );
        font-weight: 700;
    }

    .reward-box{
        background: #f3e8ff;
        border-radius: 18px;
        padding: 12px 18px;
        font-weight: 700;
        color: #6f2cff;
        display: inline-block;
    }

    .table-card{
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
    }

    .table th{
        color: #6b7280;
        font-weight: 700;
        border-bottom: 1px solid #ede9fe;
    }

    .table td{
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        padding-top: 18px;
        padding-bottom: 18px;
    }

</style>

<div class="container-fluid py-4">

    <div class="mb-5">

        <h2 class="section-title mb-1">
            Challenges
        </h2>

        <p class="text-muted mb-0">
            Complete challenges and earn rewards.
        </p>

    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-4">

            <div class="summary-card">

                <p class="summary-title">
                    Active Challenges
                </p>

                <h2 class="summary-value">

                    {{ $activeCount }}

                </h2>

            </div>

        </div>

        <div class="col-md-4">

            <div class="summary-card">

                <p class="summary-title">
                    Current Streak
                </p>

                <h2 class="summary-value">

                    {{ $currentStreak }} days

                </h2>

            </div>

        </div>

        <div class="col-md-4">

            <div class="summary-card">

                <p class="summary-title">
                    Reward Points
                </p>

                <h2 class="summary-value">

                    {{ $userPoints->points }}

                </h2>

            </div>

        </div>

    </div>

    <h3 class="fw-bold text-primary mb-4">
        🔥 Daily Challenges
    </h3>

    <div class="row g-4 mb-5">

        @forelse($dailyChallenges as $challenge)

            @php

                $userChallenge =
                    $challenge->userChallenges->first();

                $progress =
                    $userChallenge?->progress ?? 0;

                $status =
                    $userChallenge?->status ?? 'not_started';

                $percentage =
                    $challenge->target > 0
                    ? ($progress / $challenge->target) * 100
                    : 0;

                if($percentage > 100){
                    $percentage = 100;
                }

            @endphp

            <div class="col-lg-6">

                <div class="challenge-card">

                    <div class="d-flex justify-content-between align-items-start mb-4">

                        <div>

                            <h4 class="fw-bold mb-2">

                                {{ $challenge->title }}

                            </h4>

                            <p class="text-muted mb-0">

                                {{ $challenge->description }}

                            </p>

                        </div>

                        @if ($status == 'completed')

                            <span class="completed-badge">

                                Completed

                            </span>

                        @elseif($status == 'ongoing')

                            <span class="challenge-badge">

                                Ongoing

                            </span>
                
                        @elseif($status == 'failed')

                            <span class="bg-danger text-white px-3 py-2 rounded-pill">

                                Failed

                            </span>

                        @else

                            <span class="notstarted-badge">

                                Not Started

                            </span>

                        @endif

                    </div>

                    <div class="reward-box mb-4">

                        + {{ $challenge->reward_points }} Points

                    </div>

                    <div class="d-flex justify-content-between mb-2">

                        <small class="fw-semibold text-muted">

                            Challenge Progress

                        </small>

                        <small class="fw-bold text-primary">

                            {{ round($percentage) }}%

                        </small>

                    </div>

                    <div class="progress mb-3">

                        <div
                            class="progress-bar"
                            style="width:{{ $percentage }}%"
                        >

                            {{ round($percentage) }}%

                        </div>

                    </div>

                    <small class="text-muted">

                        {{ $progress }}
                        /
                        {{ $challenge->target }}

                    </small>

                    @if(
                        $status == 'completed'
                        &&
                        !$userChallenge->reward_claimed
                    )

                        <form
                            action="{{ route('challenge.claim', $challenge->id) }}"
                            method="POST"
                            class="mt-3"
                        >

                            @csrf

                            <button class="btn btn-primary w-100">

                                Claim Reward

                            </button>

                        </form>

                    @elseif(
                        $status == 'completed'
                        &&
                        $userChallenge->reward_claimed
                    )

                        <button
                            class="btn btn-success w-100 mt-3"
                            disabled
                        >

                            Reward Claimed

                        </button>

                    @endif

                </div>

            </div>

        @empty

            <p class="text-muted">

                No daily challenges.

            </p>

        @endforelse

    </div> 
    
    <h3 class="fw-bold text-primary mb-4">
        ⭐ Weekly Challenges
    </h3>

    <div class="row g-4 mb-5">

        @forelse($weeklyChallenges as $challenge)

            @php

                $userChallenge =
                    $challenge->userChallenges->first();

                $progress =
                    $userChallenge?->progress ?? 0;

                $status =
                    $userChallenge?->status ?? 'not_started';

                $percentage =
                    $challenge->target > 0
                    ? ($progress / $challenge->target) * 100
                    : 0;

                if($percentage > 100){
                    $percentage = 100;
                }

            @endphp

            <div class="col-lg-6">

                <div class="challenge-card">

                    <div class="d-flex justify-content-between align-items-start mb-4">

                        <div>

                            <h4 class="fw-bold mb-2">

                                {{ $challenge->title }}

                            </h4>

                            <p class="text-muted mb-0">

                                {{ $challenge->description }}

                            </p>

                        </div>

                        @if ($status == 'completed')

                            <span class="completed-badge">

                                Completed

                            </span>

                        @elseif($status == 'ongoing')

                            <span class="challenge-badge">

                                Ongoing

                            </span>

                        @else

                            <span class="notstarted-badge">

                                Not Started

                            </span>

                        @endif

                    </div>

                    <div class="reward-box mb-4">

                        + {{ $challenge->reward_points }} Points

                    </div>

                    <div class="d-flex justify-content-between mb-2">

                        <small class="fw-semibold text-muted">

                            Challenge Progress

                        </small>

                        <small class="fw-bold text-primary">

                            {{ round($percentage) }}%

                        </small>

                    </div>

                    <div class="progress mb-3">

                        <div
                            class="progress-bar"
                            style="width:{{ $percentage }}%"
                        >

                            {{ round($percentage) }}%

                        </div>

                    </div>

                    <small class="text-muted">

                        {{ $progress }}
                        /
                        {{ $challenge->target }}

                    </small>

                    @if(
                        $status == 'completed'
                        &&
                        !$userChallenge->reward_claimed
                    )

                        <form
                            action="{{ route('challenge.claim', $challenge->id) }}"
                            method="POST"
                            class="mt-3"
                        >

                            @csrf

                            <button class="btn btn-primary w-100">

                                Claim Reward

                            </button>

                        </form>

                    @elseif(
                        $status == 'completed'
                        &&
                        $userChallenge->reward_claimed
                    )

                        <button
                            class="btn btn-success w-100 mt-3"
                            disabled
                        >

                            Reward Claimed

                        </button>

                    @endif

                </div>

            </div>

        @empty

            <p class="text-muted">

                No weekly challenges.

            </p>

        @endforelse

    </div>

    <h3 class="fw-bold text-primary mb-4">
        🔥 Achievements
    </h3>

    <div class="row g-4 mb-5">

        @forelse($achievementChallenges as $challenge)

            @php

                $userChallenge =
                    $challenge->userChallenges->first();

                $progress =
                    $userChallenge?->progress ?? 0;

                $status =
                    $userChallenge?->status ?? 'not_started';

                $percentage =
                    $challenge->target > 0
                    ? ($progress / $challenge->target) * 100
                    : 0;

                if($percentage > 100){
                    $percentage = 100;
                }

            @endphp

            <div class="col-lg-6">

                <div class="challenge-card">

                    <div class="d-flex justify-content-between align-items-start mb-4">

                        <div>

                            <h4 class="fw-bold mb-2">

                                {{ $challenge->title }}

                            </h4>

                            <p class="text-muted mb-0">

                                {{ $challenge->description }}

                            </p>

                        </div>

                        @if ($status == 'completed')

                            <span class="completed-badge">

                                Completed

                            </span>

                        @elseif($status == 'ongoing')

                            <span class="challenge-badge">

                                Ongoing

                            </span>

                        @else

                            <span class="notstarted-badge">

                                Not Started

                            </span>

                        @endif

                    </div>

                    <div class="reward-box mb-4">

                        + {{ $challenge->reward_points }} Points

                    </div>

                    <div class="d-flex justify-content-between mb-2">

                        <small class="fw-semibold text-muted">

                            Challenge Progress

                        </small>

                        <small class="fw-bold text-primary">

                            {{ round($percentage) }}%

                        </small>

                    </div>

                    <div class="progress mb-3">

                        <div
                            class="progress-bar"
                            style="width:{{ $percentage }}%"
                        >

                            {{ round($percentage) }}%

                        </div>

                    </div>

                    <small class="text-muted">

                        {{ $progress }}
                        /
                        {{ $challenge->target }}

                    </small>

                    @if(
                        $status == 'completed'
                        &&
                        !$userChallenge->reward_claimed
                    )

                        <form
                            action="{{ route('challenge.claim', $challenge->id) }}"
                            method="POST"
                            class="mt-3"
                        >

                            @csrf

                            <button class="btn btn-primary w-100">

                                Claim Reward

                            </button>

                        </form>

                    @elseif(
                        $status == 'completed'
                        &&
                        $userChallenge->reward_claimed
                    )

                        <button
                            class="btn btn-success w-100 mt-3"
                            disabled
                        >

                            Reward Claimed

                        </button>

                    @endif

                </div>

            </div>

        @empty

            <p class="text-muted">

                No achievements to do.

            </p>

        @endforelse

    </div>

    <div class="table-card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h4 class="fw-bold mb-1">
                    Completed Challenges
                </h4>

                <p class="text-muted mb-0">
                    Last 30 days activity
                </p>

            </div>

            <span class="challenge-badge">

                {{ $completedCount }}
                Completed

            </span>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>
                            Challenge
                        </th>

                        <th>
                            Reward
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach(collect($dailyChallenges)->merge($weeklyChallenges)->merge($achievementChallenges) as $challenge)

                        @php
                            $userChallenge =
                                $challenge->userChallenges->first();
                        @endphp

                        @if($userChallenge && $userChallenge->status == 'completed')

                            <tr>

                                <td class="fw-semibold">

                                    {{ $challenge->title }}

                                </td>

                                <td class="text-primary fw-bold">

                                    +{{ $challenge->reward_points }} Points

                                </td>

                                <td class="text-muted">

                                    {{ $userChallenge->updated_at->format('d M Y') }}

                                </td>

                                <td>

                                    <span class="completed-badge">

                                        Completed

                                    </span>

                                </td>

                            </tr>

                        @endif

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection