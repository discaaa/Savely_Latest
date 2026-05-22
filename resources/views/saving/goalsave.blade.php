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

        <a href="{{ route ('saving.daily') }}" class="btn saving-btn inactive-saving">
            Daily Saving
        </a>

        <a href="{{ route('saving.goalsave') }}" class="btn saving-btn active-saving">
            Goals Saving
        </a>

        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
             width="55"
             class="rounded-circle border p-1">
    </div>

    <div class="row g-4">

        {{-- Section Kiri --}}
        <div class="col-lg-5">

            {{-- Account Card --}}
            <x-ui.card.default>

                <h2 class="fw-bold">
                    Account name
                </h2>

                <p class="fw-semibold mb-1">
                    Total Goals Saving
                </p>

                <h1 class="fw-bold">
                    Rp {{ number_format($totalGoalSaving,0,',','.') }}
                </h1>

            </x-ui.card.default>

            {{-- In Progress --}}
            <div class="d-flex align-items-center gap-3 mb-4">

                <h1 class="fw-bold text-primary">
                    Your Goals Progress
                </h1>

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

                <x-ui.card.default>

                    <h2 class="fw-bold">
                        {{ $goal->title }}
                    </h2>

                    <h3 class="fw-bold mb-4">

                        Rp {{ number_format($goal->current_amount,0,',','.') }}

                        /

                        Rp {{ number_format($goal->target_amount,0,',','.') }}

                    </h3>

                    <div class="d-flex align-items-center gap-3">

                        <div class="progress flex-grow-1"
                            style="height:25px;">

                            <div class="progress-bar progress-purple"
                                style="width:{{ $percentage }}%">

                                {{ $percentage }}%

                            </div>

                        </div>

                        <span class="
                            {{ $goal->status == 'completed'
                                ? 'completed-badge'
                                : 'days-badge'
                            }}
                        ">

                            {{ ucfirst($goal->status) }}

                        </span>

                    </div>

                </x-ui.card.default>

            @endforeach            
            
        </div>

        {{-- Section Kanan --}}
        <div class="col-lg-7">

            {{-- Top Priority --}}
            <div class="mb-4">

                <hr class="mt-4" style="border:10px solid #a855f7; border-radius:10px">

                <h1 class="fw-bold">
                    {{ $topGoal->title ?? '-' }}
                </h1>

                <h4 class="text-secondary fw-semibold">
                    Top Saving Priority
                </h4>

            </div>

            {{-- Saved Card - Integrate Database --}}
            <x-ui.card.default>

                <h3 class="fw-bold">
                    You've saved
                </h3>

                <h1 class="fw-bold mb-3">
                    Rp {{ number_format($topGoal->current_amount ?? 0,0,',','.') }}
                </h1>

                <h3 class="fw-bold">
                    Out of Rp {{ number_format($topGoal->target_amount ?? 0,0,',','.') }}
                </h3>

                <div class="progress mt-4 mb-3" style="height:10px;">

                    <div class="progress-bar progress-purple" style="width:{{ $topPercentage }}%">
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-3">

                    <span class="completed-badge">
                        {{ $topPercentage }}% completed
                    </span>

                    <span class="days-badge">
                        99 days left
                    </span>

                </div>

            </x-ui.card.default>

            {{-- Transaction Goal Input / Output History - Integrate Database --}}
            <h4 class="fw-bold text-primary mt-4 mb-4">
                All transactions
            </h4>

            <div class="position-relative ps-4">

                <div class="timeline-line position-absolute top-0 start-0"></div>
                
                @foreach($transactions as $transaction)

                <div class="position-relative mb-4">

                    <div class="timeline-dot"></div>

                    <h5 class="fw-bold ms-4">

                        {{ \Carbon\Carbon::parse(
                            $transaction->saving_date
                        )->format('d F Y') }}

                    </h5>

                    <x-ui.card.default>

                        <h4 class="text-success fw-bold mb-1">

                            @if($transaction->amount > 0)

                                <h4 class="text-success fw-bold mb-1">

                                    +Rp {{ number_format($transaction->amount,0,',','.') }}

                                </h4>

                            @else

                                <h4 class="text-danger fw-bold mb-1">

                                    -Rp {{ number_format(abs($transaction->amount),0,',','.') }}

                                </h4>

                            @endif

                        </h4>

                        <p class="fw-bold mb-0">

                            {{ $transaction->goal->title ?? '-' }}

                        </p>

                    </x-ui.card.default>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    {{-- Button New Goal --}}
    <a href="/goals/create" class="goal-btn text-decoration-none">
        + Add New Goal
    </a>

</div>

@endsection