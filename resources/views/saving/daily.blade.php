@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .top-btn{
        border-radius: 16px;
        padding: 12px 24px;
        font-weight: 700;
        transition: 0.3s;
    }

    .active-btn{
        background: #6f2cff;
        color: white;
        border: none;
        box-shadow: 0 8px 20px rgba(111,44,255,0.18);
    }

    .inactive-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        background: white;
    }

    .inactive-btn:hover{
        background: #f3e8ff;
        color: #6f2cff;
    }

    .summary-card{
        background: white;
        border-radius: 28px;
        padding: 30px;
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
        font-size: 34px;
        font-weight: 800;
        color: #111827;
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
        background: #ede9fe;
        overflow: hidden;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #a855f7
        );
        font-weight: 700;
    }

    .goal-status{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .goal-icon{
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 18px;
        background: #f3e8ff;
        padding: 12px;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .floating-btn{
        position: fixed;
        bottom: 30px;
        right: 40px;
        background: #6f2cff;
        color: white;
        border-radius: 18px;
        padding: 14px 24px;
        font-weight: bold;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(111,44,255,0.25);
        transition: 0.3s;
    }

    .floating-btn:hover{
        background: #5b21b6;
        color: white;
        transform: translateY(-2px);
    }

    .empty-img{
        width: 180px;
    }

</style>

@php

    $totalTarget = $goals->sum('target_amount');

    $overallPercentage = 0;

    if($totalTarget > 0){

        $overallPercentage = round(
            ($totalSaving / $totalTarget) * 100
        );
    }

@endphp

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                Daily Saving
            </h2>

            <p class="text-muted mb-0">
                Track all your saving and monitor your progress.
            </p>

        </div>

        <div class="d-flex gap-3 align-items-center">

            <a href="{{ route('saving.daily') }}"
               class="btn top-btn inactive-btn">

                Daily Saving

            </a>

            <a href="{{ route('saving.goalsave') }}"
               class="btn top-btn active-btn">

                Goals Saving

            </a>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="55"
                 class="rounded-circle border p-1 bg-white">

        </div>

    </div>

    <div class="row g-4 mb-4">

        <div class="col-lg-4">

            <div class="summary-card">

                <p class="summary-title">
                    Total Saving
                </p>

                <h2 class="summary-value">

                    Rp {{ number_format($totalSaving,0,',','.') }}

                </h2>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="summary-card">

                <p class="summary-title">
                    Total Goals
                </p>

                <h2 class="summary-value">

                    {{ $goals->count() }}

                </h2>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="summary-card">

                <p class="summary-title">
                    Overall Progress
                </p>

                <h2 class="summary-value">

                    {{ $overallPercentage }}%

                </h2>

                <div class="progress mt-3"
                     style="height:18px;">

                    <div class="progress-bar"
                         style="width: {{ $overallPercentage }}%">

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-7">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="fw-bold mb-0">
                        Saving Goals
                    </h3>

                    <span class="goal-status">

                        {{ $goals->count() }} Goals

                    </span>

                </div>

                @forelse ($goals as $goal)

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

                        <div class="d-flex justify-content-between align-items-start mb-4">

                            <div class="d-flex gap-3">

                                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                                     class="goal-icon">

                                <div>

                                    <h5 class="fw-bold mb-1">

                                        {{ $goal->title }}

                                    </h5>

                                    <small class="text-muted">

                                        Target :
                                        Rp {{ number_format($goal->target_amount,0,',','.') }}

                                    </small>

                                </div>

                            </div>

                            <span class="goal-status">

                                {{ ucfirst($goal->status) }}

                            </span>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <small class="fw-semibold text-muted">

                                Saved Amount

                            </small>

                            <small class="fw-bold text-primary">

                                {{ $percentage }}%

                            </small>

                        </div>

                        <div class="progress mb-3"
                             style="height:20px;">

                            <div class="progress-bar"
                                 style="width: {{ $percentage }}%">

                                {{ $percentage }}%

                            </div>

                        </div>

                        <h5 class="fw-bold text-dark mb-0">

                            Rp {{ number_format($goal->current_amount,0,',','.') }}

                        </h5>

                        <div class="d-flex justify-content-end gap-4 mt-2">

                            <a href="{{ route('goals.detail', $goal->id) }}"
                            class="btn btn-outline-primary border-radius: 20%; width: 70px">

                                Detail

                            </a>

                            <a href="{{ route('goals.edit', $goal->id) }}"
                            class="btn text-white"
                            style="background:#6f2cff; border-radius: 20%;" style="width: 70px">

                                Edit

                            </a>

                            <a href="{{ route('goals.history', $goal->id) }}"
                            class="btn btn-outline-secondary border-radius: 20%" style="width: 70px">

                                History

                            </a>

                        </div>                        

                    </div>

                @empty

                    <div class="text-center py-5">

                        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                             class="empty-img mb-4">

                        <h4 class="fw-bold">
                            No Saving Goals Yet
                        </h4>

                        <p class="text-muted">
                            Create your first saving goal now.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

        <div class="col-lg-5">

            <div class="summary-card mb-4">

                <h3 class="fw-bold mb-4">
                    Saving Summary
                </h3>

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

                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <h6 class="fw-bold mb-0">

                                {{ $goal->title }}

                            </h6>

                            <small class="text-primary fw-bold">

                                {{ $percentage }}%

                            </small>

                        </div>

                        <div class="progress"
                             style="height:16px;">

                            <div class="progress-bar"
                                 style="width: {{ $percentage }}%">

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="summary-card">

                <h3 class="fw-bold mb-4">
                    Recent Activity
                </h3>

                @foreach($goals->take(5) as $goal)

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h6 class="fw-bold mb-1">

                                {{ $goal->title }}

                            </h6>

                            <small class="text-muted">

                                Target :
                                Rp {{ number_format($goal->target_amount,0,',','.') }}

                            </small>

                        </div>

                        <div class="text-end">

                            <h6 class="fw-bold text-primary">

                                Rp {{ number_format($goal->current_amount,0,',','.') }}

                            </h6>

                            <small class="text-muted">

                                {{ ucfirst($goal->status) }}

                            </small>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    <a href="{{ route('saving.create') }}"
       class="floating-btn">

        + Add New Saving

    </a>

</div>

@endsection