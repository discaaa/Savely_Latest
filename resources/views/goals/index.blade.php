@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .page-title{
        font-size: 34px;
        font-weight: 800;
        color: #5b21b6;
    }

    .page-subtitle{
        color: #6b7280;
        font-size: 15px;
    }

    .goal-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 16px;
        padding: 14px 24px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(111,44,255,0.2);
    }

    .goal-btn:hover{
        background: #5b21b6;
        color: white;
        transform: translateY(-2px);
    }

    .summary-card{
        background: white;
        border-radius: 28px;
        padding: 28px;
        box-shadow: 0 8px 25px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
        transition: 0.3s;
    }

    .summary-card:hover{
        transform: translateY(-4px);
    }

    .summary-title{
        color: #6b7280;
        font-size: 14px;
    }

    .summary-value{
        font-size: 28px;
        font-weight: 800;
        color: #111827;
    }

    .tabs-wrapper{
        display: flex;
        gap: 18px;
        margin-bottom: 30px;
    }

    .goal-tab{
        padding: 12px 22px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 700;
        color: #6b7280;
        background: white;
        transition: 0.2s;
        border: 1px solid #ede9fe;
    }

    .goal-tab.active{
        background: #6f2cff;
        color: white;
        box-shadow: 0 8px 20px rgba(111,44,255,0.2);
    }

    .goal-card{
        background: white;
        border-radius: 30px;
        padding: 28px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        margin-bottom: 25px;
        transition: 0.3s;
        border: 1px solid #ede9fe;
    }

    .goal-card:hover{
        transform: translateY(-3px);
    }

    .goal-img{
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 20px;
        background: #f3e8ff;
        padding: 10px;
    }

    .goal-title{
        font-size: 22px;
        font-weight: 800;
        color: #111827;
    }

    .goal-target{
        color: #6b7280;
        font-size: 14px;
    }

    .progress{
        height: 12px;
        border-radius: 999px;
        background: #ede9fe;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #7c3aed,
            #a855f7
        );
        border-radius: 999px;
    }

    .saved-amount{
        font-size: 24px;
        font-weight: 800;
        color: #111827;
    }

    .goal-status{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        display: inline-block;
    }

    .detail-btn{
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 700;
    }

    .edit-btn{
        background: #6f2cff;
        color: white;
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 700;
        text-decoration: none;
    }

    .edit-btn:hover{
        background: #5b21b6;
        color: white;
    }

    .empty-img{
        width: 180px;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="page-title">
                My Goals
            </h1>

            <p class="page-subtitle">
                Plan smarter, save consistently, and achieve your dreams.
            </p>

        </div>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('goals.create') }}"
            class="goal-btn">
                + New Goal
            </a>
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="55" class="rounded-circle border p-1 bg-white">
        </div>

    </div>

    <div class="row g-4 mb-5">

        <div class="col-lg-3">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Total Goals
                        </p>

                        <h3 class="summary-value">
                            {{ $totalGoals }}
                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Total Target
                        </p>

                        <h3 class="summary-value">

                            Rp {{ number_format($totalTarget,0,',','.') }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Total Saved
                        </p>

                        <h3 class="summary-value">

                            Rp {{ number_format($totalSaved,0,',','.') }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Goals Achieved
                        </p>

                        <h3 class="summary-value text-success">

                            {{ $completedGoals }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="tabs-wrapper">

        <a href="{{ route('goals.index') }}"
           class="goal-tab {{ request('tab') == null ? 'active' : '' }}">

            All Goals

        </a>

        <a href="{{ route('goals.index', ['tab' => 'ongoing']) }}"
           class="goal-tab {{ request('tab') == 'ongoing' ? 'active' : '' }}">

            Ongoing

        </a>

        <a href="{{ route('goals.index', ['tab' => 'completed']) }}"
           class="goal-tab {{ request('tab') == 'completed' ? 'active' : '' }}">

            Completed

        </a>

    </div>

    @forelse($goals as $goal)

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

        <div class="goal-card">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <div class="d-flex align-items-center gap-4">

                        @if($goal->image)

                            <img src="{{ asset('storage/' . $goal->image) }}"
                                 class="goal-img">

                        @else

                            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                                 class="goal-img">

                        @endif

                        <div class="w-100">

                            <h3 class="goal-title mb-1">

                                {{ $goal->title }}

                            </h3>

                            <p class="goal-target mb-3">

                                Target:
                                Rp {{ number_format($goal->target_amount,0,',','.') }}

                            </p>

                            <div class="progress">

                                <div class="progress-bar"
                                     style="width:{{ $percentage }}%">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">

                    <h2 class="saved-amount mb-2">

                        Rp {{ number_format($goal->current_amount,0,',','.') }}

                    </h2>

                    <p class="text-secondary mb-2">

                        {{ $percentage }}% completed

                    </p>

                    <span class="goal-status mb-4">

                        {{ ucfirst($goal->status) }}

                    </span>

                    <div class="d-flex justify-content-lg-end gap-2 mt-4">

                        <a href="{{ route('goals.detail', $goal->id) }}"
                           class="btn btn-outline-primary detail-btn">

                            Detail

                        </a>

                        <a href="{{ route('goals.edit', $goal->id) }}"
                           class="edit-btn">

                            Edit

                        </a>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="goal-card text-center py-5">

            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                 class="empty-img mb-4">

            <h4 class="fw-bold">
                No Goals Yet
            </h4>

            <p class="text-muted">
                Create your first financial goal and start saving today.
            </p>

        </div>

    @endforelse

</div>

@endsection