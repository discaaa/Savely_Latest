@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .section-subtitle{
        color: #6b7280;
        font-size: 15px;
    }

    .saving-btn{
        border-radius: 16px;
        padding: 12px 24px;
        font-weight: 700;
        transition: 0.3s;
    }

    .active-saving{
        background: #6f2cff;
        color: white;
        border: none;
        box-shadow: 0 8px 20px rgba(111,44,255,0.18);
    }

    .inactive-saving{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        background: white;
    }

    .inactive-saving:hover{
        background: #f3e8ff;
        color: #6f2cff;
    }

    .summary-card{
        background: white;
        border-radius: 28px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
    }

    .goal-card{
        background: white;
        border-radius: 26px;
        padding: 28px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
        transition: 0.3s;
    }

    .goal-card:hover{
        transform: translateY(-3px);
    }

    .progress{
        height: 12px;
        border-radius: 20px;
        background: #ede9fe;
        overflow: hidden;
    }

    .progress-purple{
        background: #6f2cff;
    }

    .status-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 8px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .completed-badge{
        background: #dcfce7;
        color: #166534;
    }

    .transaction-title{
        font-size: 15px;
        color: #6b7280;
        font-weight: 600;
    }

    .timeline-line{
        position: absolute;
        left: 7px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #c084fc;
    }

    .timeline-dot{
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #6f2cff;
        position: absolute;
        left: 0;
        top: 6px;
    }

    .transaction-card{
        background: white;
        border-radius: 22px;
        padding: 22px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.06);
    }

    .goal-btn{
        position: fixed;
        bottom: 30px;
        right: 35px;
        background: #6f2cff;
        color: white;
        padding: 14px 24px;
        border-radius: 18px;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 8px 24px rgba(111,44,255,0.2);
        transition: 0.3s;
    }

    .goal-btn:hover{
        background: #5b21b6;
        color: white;
        transform: translateY(-3px);
        scale: 1.02;
    }

    .top-progress-card{
        background: linear-gradient(
            135deg,
            #7c3aed,
            #6f2cff
        );
        border-radius: 30px;
        padding: 35px;
        color: white;
        box-shadow: 0 12px 35px rgba(111,44,255,0.2);
    }

    .top-progress{
        height: 12px;
        background: rgba(255,255,255,0.2);
        border-radius: 20px;
        overflow: hidden;
    }

    .top-progress .progress-bar{
        background: white;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                Goals Saving
            </h2>

            <p class="section-subtitle mb-0">
                Manage and track all your saving goals
            </p>

        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('saving.daily') }}"
               class="btn saving-btn inactive-saving">

                Daily Saving

            </a>

            <a href="{{ route('saving.goalsave') }}"
               class="btn saving-btn active-saving">

                Goals Saving

            </a>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="55"
                 class="rounded-circle border p-1 bg-white">

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-5">

            <div class="summary-card mb-4">

                <p class="section-subtitle mb-2">
                    Total Goals Saving
                </p>

                <h1 class="fw-bold">

                    Rp {{ number_format($totalGoalSaving,0,',','.') }}

                </h1>

            </div>

            <div class="mb-4">

                <h3 class="section-title">
                    Your Goals Progress
                </h3>

            </div>

            @foreach($goals as $goal)

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

                <div class="goal-card mb-4">

                    <div class="d-flex justify-content-between mb-3">

                        <div>

                            <h4 class="fw-bold mb-1">

                                {{ $goal->title }}

                            </h4>

                            <small class="text-secondary">

                                Target
                                Rp {{ number_format($goal->target_amount,0,',','.') }}

                            </small>

                        </div>

                        <span class="status-badge
                            {{ $goal->status == 'completed'
                                ? 'completed-badge'
                                : ''
                            }}">

                            {{ ucfirst($goal->status) }}

                        </span>

                    </div>

                    <div class="progress mb-3">

                        <div class="progress-bar progress-purple"
                             style="width:{{ $percentage }}%">
                        </div>

                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <small class="text-secondary">

                            Saved
                            Rp {{ number_format($goal->current_amount,0,',','.') }}

                        </small>

                        <small class="fw-bold text-primary">

                            {{ $percentage }}%

                        </small>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="col-lg-7">

            <div class="mb-4">

                <p class="section-subtitle mb-2">
                    Top Saving Priority
                </p>

                <h1 class="section-title">

                    {{ $topGoal->title ?? '-' }}

                </h1>

            </div>

            <div class="top-progress-card mb-5">

                <h5 class="fw-semibold mb-3">
                    You've Saved
                </h5>

                <h1 class="fw-bold mb-3">

                    Rp {{ number_format($topGoal->current_amount ?? 0,0,',','.') }}

                </h1>

                <p class="mb-4">

                    Out of
                    Rp {{ number_format($topGoal->target_amount ?? 0,0,',','.') }}

                </p>

                <div class="top-progress mb-4">

                    <div class="progress-bar"
                         style="width:{{ $topPercentage }}%">
                    </div>

                </div>

                <div class="d-flex justify-content-between">

                    <span>

                        {{ $topPercentage }}% Completed

                    </span>

                    <span>

                        {{ ucfirst($topGoal->status ?? '-') }}

                    </span>

                </div>

            </div>

            <div class="mb-4">

                <h3 class="section-title">
                    All Transactions
                </h3>

            </div>

            <div class="position-relative ps-4 pe-2">

                <div class="timeline-line"></div>

                @foreach($transactions as $transaction)

                <div class="position-relative mb-4">

                    <div class="timeline-dot"></div>

                    <div class="ms-4">

                        <p class="transaction-title mb-2">

                            {{ \Carbon\Carbon::parse(
                                $transaction->saving_date
                            )->format('d F Y') }}

                        </p>

                        <div class="transaction-card">

                            @if($transaction->amount > 0)

                                <h4 class="fw-bold text-success mb-2">

                                    + Rp {{ number_format($transaction->amount,0,',','.') }}

                                </h4>

                            @else

                                <h4 class="fw-bold text-danger mb-2">

                                    - Rp {{ number_format(abs($transaction->amount),0,',','.') }}

                                </h4>

                            @endif

                            <p class="fw-bold mb-1">

                                {{ $transaction->goal->title ?? '-' }}

                            </p>

                            <small class="text-secondary">

                                {{ $transaction->method }}

                            </small>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    <a href="{{ route('goals.create') }}"
       class="goal-btn">

        + Add New Goal

    </a>

</div>

@endsection