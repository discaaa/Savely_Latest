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
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        height: 100%;
    }

    .summary-title{
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .summary-value{
        font-size: 32px;
        font-weight: 800;
        color: #111827;
    }

    .quick-btn{
        background: #6f2cff;
        color: white;
        border-radius: 16px;
        padding: 12px 22px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(111,44,255,0.18);
    }

    .quick-btn:hover{
        background: #5b21b6;
        color: white;
        transform: translateY(-2px);
    }

    .goal-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        transition: 0.3s;
    }

    .goal-card:hover{
        transform: translateY(-3px);
    }

    .progress{
        border-radius: 999px;
        overflow: hidden;
        background: #ede9fe;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #a855f7
        );
        font-weight: 700;
    }

    .activity-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
    }

    .activity-item{
        padding: 16px 0;
        border-bottom: 1px solid #ede9fe;
    }

    .activity-item:last-child{
        border-bottom: none;
        padding-bottom: 0;
    }

    .badge-expense{
        background: #fee2e2;
        color: #dc2626;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .badge-saving{
        background: #dcfce7;
        color: #16a34a;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .goal-icon{
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 18px;
        background: #f3e8ff;
        padding: 12px;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                Dashboard
            </h2>

            <p class="text-muted mb-0">
                Welcome back! Here's your financial summary.
            </p>

        </div>

        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
             width="60"
             class="rounded-circle border p-1 bg-white">

    </div>

    <div class="row g-4 mb-5">

        <div class="col-lg-4">

            <div class="summary-card">

                <p class="summary-title">
                    Total Expense
                </p>

                <h2 class="summary-value">

                    Rp {{ number_format($totalExpense ?? 0,0,',','.') }}

                </h2>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="summary-card">

                <p class="summary-title">
                    Saving Progress
                </p>

                <h2 class="summary-value">

                    {{ $savingProgress ?? 0 }}%

                </h2>

                <div class="progress mt-3"
                     style="height:18px;">

                    <div class="progress-bar"
                         style="width: {{ $savingProgress ?? 0 }}%">

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="summary-card">

                <p class="summary-title">
                    Active Challenges
                </p>

                <h2 class="summary-value">

                    {{ $activeChallenges ?? 0 }}

                </h2>

            </div>

        </div>

    </div>

    <div class="mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold mb-0">
                Quick Access
            </h3>

        </div>

        <div class="d-flex gap-3 flex-wrap">

            <a href="{{ route('expense.create') }}"
               class="quick-btn">

                + Add Expense

            </a>

            <a href="{{ route('saving.create') }}"
               class="quick-btn">

                + Add Saving

            </a>

            <a href="{{ route('goals.create') }}"
               class="quick-btn">

                + Create Goal

            </a>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-5">

            <div class="goal-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="fw-bold mb-0">
                        Goals Progress
                    </h3>

                    <a href="{{ route('goals.index') }}"
                       class="text-decoration-none fw-semibold">

                        View All

                    </a>

                </div>

                @forelse($goals ?? [] as $goal)

                    @php

                        $percentage = 0;

                        if($goal->target_amount > 0){

                            $percentage = min(
                                100,
                                round(
                                    ($goal->current_amount /
                                    $goal->target_amount) * 100
                                )
                            );
                        }

                    @endphp

                    <div class="mb-4">

                        <div class="d-flex gap-3 mb-3">

                            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                                 class="goal-icon">

                            <div class="w-100">

                                <div class="d-flex justify-content-between">

                                    <h5 class="fw-bold mb-1">

                                        {{ $goal->title }}

                                    </h5>

                                    <small class="text-primary fw-bold">

                                        {{ $percentage }}%

                                    </small>

                                </div>

                                <small class="text-muted">

                                    Rp {{ number_format($goal->current_amount,0,',','.') }}

                                    /

                                    Rp {{ number_format($goal->target_amount,0,',','.') }}

                                </small>

                            </div>

                        </div>

                        <div class="progress"
                             style="height:18px;">

                            <div class="progress-bar"
                                 style="width: {{ $percentage }}%">

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                             width="160"
                             class="mb-4">

                        <h5 class="fw-bold">
                            No Goals Yet
                        </h5>

                        <p class="text-muted mb-0">
                            Create your first saving goal now.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

        <div class="col-lg-7">

            <div class="activity-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="fw-bold mb-0">
                        Recent Activity
                    </h3>

                    <a href="{{ route('history.index') }}"
                       class="text-decoration-none fw-semibold">

                        View All

                    </a>

                </div>

                @forelse($recentActivities ?? [] as $activity)

                    <div class="activity-item">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="fw-bold mb-1">

                                    {{ $activity['title'] }}

                                </h6>

                                <small class="text-muted">

                                    {{ \Carbon\Carbon::parse(
                                        $activity['date']
                                    )->format('d M Y') }}

                                </small>

                            </div>

                            <div>

                                @if($activity['type'] == 'expense')

                                    <span class="badge-expense">
                                        Expense
                                    </span>

                                @else

                                    <span class="badge-saving">
                                        Saving
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                             width="160"
                             class="mb-4">

                        <h5 class="fw-bold">
                            No Recent Activity
                        </h5>

                        <p class="text-muted mb-0">
                            Your latest transactions will appear here.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection