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

    .purple-text{
        color: #6f2cff;
        font-size: 25px;
    }

    .progress{
        border-radius: 20px;
        overflow: hidden;
        background-color: #e9ecef;
    }

    .progress-bar{
        font-weight: bold;
    }

    .purple-bar{
        background-color: #9b5cff;
        color: white;
    }

    .small-progress{
        height: 22px;
    }

    .badge-soft{
        background-color: #b8f28b;
        color: #3b3b3b;
        border-radius: 10px;
        padding: 4px 12px;
        font-size: 14px;
    }

    .saving-bottom-btn{
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

@php

    $totalTarget = $goals->sum('target_amount');

    $overallPercentage = 0;

    if($totalTarget > 0){

        $overallPercentage = round(
            ($totalSaving / $totalTarget) * 100
        );
    }

@endphp

<div class="container-fluid">

    {{-- TOP BUTTON --}}
    <div class="d-flex justify-content-end align-items-center gap-3 mb-4">

        <a href="{{ route('saving.daily') }}"
           class="btn saving-btn active-saving">

            Daily Saving

        </a>

        <a href="{{ route('saving.goalsave') }}"
           class="btn saving-btn inactive-saving">

            Goals Saving

        </a>

        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
             width="55"
             class="rounded-circle border p-1">

    </div>

    <div class="row g-4">

        {{-- LEFT SECTION --}}
        <div class="col-lg-5">

            {{-- TOTAL SAVING --}}
            <x-ui.card.default>

                <h3 class="fw-bold">
                    Total Saving
                </h3>

                <p class="mb-1">
                    All Goals
                </p>

                <h2 class="fw-bold">

                    Rp {{ number_format($totalSaving,0,',','.') }}

                </h2>

            </x-ui.card.default>

            {{-- OVERALL PROGRESS --}}
            <x-ui.card.default>

                <h3 class="fw-bold mb-4">
                    Overall Progress
                </h3>

                <h4 class="fw-bold">

                    Rp {{ number_format($totalSaving,0,',','.') }}

                    /

                    Rp {{ number_format($totalTarget,0,',','.') }}

                </h4>

                <div class="d-flex align-items-center gap-2 mt-4">

                    <span class="badge-soft">

                        {{ $overallPercentage }}% Completed

                    </span>

                    <div class="progress flex-grow-1"
                         style="height:20px;">

                        <div class="progress-bar purple-bar"
                             style="width: {{ $overallPercentage }}%">

                            {{ $overallPercentage }}%

                        </div>

                    </div>

                </div>

            </x-ui.card.default>

            {{-- GOALS --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <h2 class="fw-bold">
                    Saving Goals
                </h2>

                <x-ui.button.primary>

                    {{ $goals->count() }} Goals

                </x-ui.button.primary>

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

                <x-ui.card.default>

                    <div class="d-flex justify-content-between">

                        <div>

                            <h3 class="fw-bold">

                                {{ $goal->title }}

                            </h3>

                            <p class="text-muted mb-0">

                                {{ $goal->status }}

                            </p>

                        </div>

                        <div class="text-end">

                            <small class="text-muted">

                                Deadline

                            </small>

                            <p class="fw-bold">

                                {{ $goal->deadline }}

                            </p>

                        </div>

                    </div>

                    <h4 class="fw-bold my-4">

                        Rp {{ number_format($goal->current_amount,0,',','.') }}

                        /

                        Rp {{ number_format($goal->target_amount,0,',','.') }}

                    </h4>

                    <div class="d-flex align-items-center gap-3">

                        <div class="progress flex-grow-1 small-progress">

                            <div class="progress-bar purple-bar"
                                 style="width: {{ $percentage }}%">

                                {{ $percentage }}%

                            </div>

                        </div>

                        <span class="fw-bold text-primary">

                            {{ $percentage }}%

                        </span>

                    </div>

                </x-ui.card.default>

            @empty

                <x-ui.card.default>

                    <h4 class="fw-bold">
                        No Saving Goals Yet
                    </h4>

                    <p class="text-muted mb-0">
                        Create your first saving goal.
                    </p>

                </x-ui.card.default>

            @endforelse

        </div>

        {{-- RIGHT SECTION --}}
        <div class="col-lg-7">

            {{-- MONTHLY SUMMARY --}}
            <x-ui.card.default>

                <h2 class="fw-bold mb-5">
                    Saving Summary
                </h2>

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

                    <div class="row align-items-center mb-4">

                        <div class="col-3">

                            <h5 class="purple-text fw-bold">

                                {{ $goal->title }}

                            </h5>

                        </div>

                        <div class="col-7">

                            <div class="progress"
                                 style="height:30px;">

                                <div class="progress-bar purple-bar"
                                     style="width: {{ $percentage }}%">

                                    {{ $percentage }}%

                                </div>

                            </div>

                        </div>

                        <div class="col-2 text-end">

                            <span class="fw-bold text-primary">

                                {{ $goal->status }}

                            </span>

                        </div>

                    </div>

                @endforeach

            </x-ui.card.default>

            {{-- RECENT GOALS --}}
            <x-ui.card.default>

                <h2 class="fw-bold mb-4">
                    Recent Saving Activity
                </h2>

                @foreach($goals->take(5) as $goal)

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h5 class="fw-bold mb-1">

                                {{ $goal->title }}

                            </h5>

                            <small class="text-muted">

                                Target:
                                Rp {{ number_format($goal->target_amount,0,',','.') }}

                            </small>

                        </div>

                        <div class="text-end">

                            <h5 class="fw-bold text-primary">

                                Rp {{ number_format($goal->current_amount,0,',','.') }}

                            </h5>

                            <small>

                                {{ $goal->status }}

                            </small>

                        </div>

                    </div>

                @endforeach

            </x-ui.card.default>

        </div>

    </div>

    {{-- FLOATING BUTTON --}}
    <a href="{{ route('saving.create') }}"
       class="saving-bottom-btn text-decoration-none">

        + Add New Saving

    </a>

</div>

@endsection