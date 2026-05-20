@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background-color: #f5f5f5;
    }

    .saving-btn{
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 600;
    }

    .active-saving{
        background-color: #6f2cff;
        color: white;
        border: none;
    }

    .inactive-saving{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        background: white;
    }

    .purple-btn{
        background-color: #6f2cff;
        color: white;
        border-radius: 30px;
        padding: 10px 24px;
        font-weight: bold;
        border: none;
    }

    .outline-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        border-radius: 30px;
        padding: 10px 24px;
        font-weight: bold;
        background: white;
    }

    .progress{
        border-radius: 20px;
        overflow: hidden;
        background-color: #ececec;
    }

    .progress-purple{
        background-color: #6f2cff;
    }

    .progress-green{
        background-color: #52ff33;
        color: black;
        font-weight: bold;
    }

    .progress-red{
        background-color: #ff8b8b;
        color: black;
        font-weight: bold;
    }

    .days-badge{
        background-color: #b16cff;
        color: white;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .completed-badge{
        background-color: #ff8b8b;
        color: black;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .timeline-line{
        border-left: 2px solid #7c3aed;
        margin-left: 12px;
        height: 100%;
    }

    .timeline-dot{
        width: 16px;
        height: 16px;
        background-color: #6f2cff;
        border-radius: 50%;
        position: absolute;
        left: -8px;
        top: 8px;
    }

    .goal-btn{
        position: fixed;
        bottom: 30px;
        right: 40px;
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 14px 22px;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

</style>

<div class="container-fluid">

    {{-- Button Atas --}}
    <div class="d-flex justify-content-end align-items-center gap-3 mb-4">

        <a href="/daily" class="btn saving-btn inactive-saving">
            Daily Saving
        </a>

        <a href="/goalsave" class="btn saving-btn active-saving">
            Goals Saving
        </a>

        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
             width="55"
             class="rounded-circle border p-1">

    </div>

    <div class="row g-4">

        {{-- LEFT --}}
        <div class="col-lg-5">

            <x-ui.card.default>

                <h2 class="fw-bold">
                    Account name
                </h2>

                <p class="fw-semibold mb-1">
                    Total Goals Saving
                </p>

                <h1 class="fw-bold">
                    Rp {{ number_format($totalGoals ?? 0, 0, ',', '.') }}
                </h1>

            </x-ui.card.default>

            <div class="mb-4">
                <h3 class="fw-bold text-primary">
                    Your Goals Progress
                </h3>
            </div>

            {{-- LOOP GOALS --}}
            @foreach($goals as $goal)

            @php
                $saved = $goal->saved_amount ?? 0;
                $target = $goal->target_amount ?? 0;
                $progress = $target > 0 ? ($saved / $target) * 100 : 0;
                $progress = min($progress, 100);
            @endphp

            <x-ui.card.default>

                <h2 class="fw-bold">
                    {{ $goal->name }}
                </h2>

                <h3 class="fw-bold mb-4">
                    Rp {{ number_format($saved, 0, ',', '.') }}
                    /
                    Rp {{ number_format($target, 0, ',', '.') }}
                </h3>

                <div class="d-flex align-items-center gap-3">

                    <div class="progress flex-grow-1" style="height:25px;">

                        <div class="progress-bar progress-green"
                             style="width: {{ $progress }}%">
                            {{ number_format($progress, 0) }}%
                        </div>

                    </div>

                    <span class="days-badge">
                        {{ $goal->days_left ?? '-' }} days left
                    </span>

                </div>

            </x-ui.card.default>

            @endforeach

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-7">

            <div class="mb-4">

                <hr class="mt-4" style="border:10px solid #a855f7; border-radius:10px">

                <h1 class="fw-bold">
                    {{ $goals[0]->name ?? 'No Goal Selected' }}
                </h1>

                <h4 class="text-secondary fw-semibold">
                    {{ $goals[0]->description ?? '' }}
                </h4>

            </div>

            {{-- SELECTED GOAL --}}
            @php
                $selected = $goals[0] ?? null;
                $saved = $selected->saved_amount ?? 0;
                $target = $selected->target_amount ?? 0;
                $progress = $target > 0 ? ($saved / $target) * 100 : 0;
            @endphp

            <x-ui.card.default>

                <h3 class="fw-bold">
                    You've saved
                </h3>

                <h1 class="fw-bold mb-3">
                    Rp {{ number_format($saved, 0, ',', '.') }}
                </h1>

                <h3 class="fw-bold">
                    Out of Rp {{ number_format($target, 0, ',', '.') }}
                </h3>

                <div class="progress mt-4 mb-3" style="height:10px;">

                    <div class="progress-bar progress-purple"
                         style="width: {{ min($progress,100) }}%">
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-3">

                    <span class="completed-badge">
                        {{ number_format($progress, 0) }}% completed
                    </span>

                    <span class="days-badge">
                        {{ $selected->days_left ?? '-' }} days left
                    </span>

                </div>

            </x-ui.card.default>

        </div>

    </div>

    <a href="/goals/create" class="goal-btn text-decoration-none">
        + Add New Goal
    </a>

</div>

@endsection