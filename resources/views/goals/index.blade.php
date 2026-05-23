@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f7f7f7;
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border-radius: 20px;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
    }

    .progress{
        height: 10px;
        border-radius: 20px;
    }

    .progress-bar{
        background: #7c3aed;
    }

</style>

<div class="container-fluid">

    {{-- header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                My Goals
            </h2>

            <p class="text-secondary">
                Plan your dreams, track your progress, achieve more.
            </p>

        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('goals.create') }}"
               class="purple-btn text-decoration-none">

                + New Goal

            </a>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="50"
                 class="rounded-circle">

        </div>

    </div>

    {{-- statistics --}}
    <div class="row mb-4">

        <div class="col-md-3">

            <x-ui.card.default>

                <small>
                    Total Goals
                </small>

                <h3 class="fw-bold">
                    {{ $totalGoals }}
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-3">

            <x-ui.card.default>

                <small>
                    Total Target
                </small>

                <h3 class="fw-bold">

                    Rp {{ number_format(
                        $totalTarget,
                        0,
                        ',',
                        '.'
                    ) }}

                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-3">

            <x-ui.card.default>

                <small>
                    Total Saved
                </small>

                <h3 class="fw-bold">

                    Rp {{ number_format(
                        $totalSaved,
                        0,
                        ',',
                        '.'
                    ) }}

                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-3">

            <x-ui.card.default>

                <small>
                    Goals Achieved
                </small>

                <h3 class="fw-bold text-success">
                    {{ $completedGoals }}
                </h3>

            </x-ui.card.default>

        </div>

    </div>

    <hr class="mt-4 mb-4"
        style="border:5px solid #a855f7; border-radius:10px">

    {{-- tabs --}}
    <div class="d-flex gap-4 mb-4 fw-semibold">

        <a href="{{ route('goals.index') }}"
           class="text-decoration-none
           {{ request('tab') == null ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">

            All Goals

        </a>

        <a href="{{ route('goals.index', ['tab' => 'ongoing']) }}"
           class="text-decoration-none
           {{ request('tab') == 'ongoing' ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">

            In Progress

        </a>

        <a href="{{ route('goals.index', ['tab' => 'completed']) }}"
           class="text-decoration-none
           {{ request('tab') == 'completed' ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">

            Completed

        </a>

    </div>

    {{-- list goal --}}
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

        <x-ui.card.default>

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center gap-3">

                    {{-- icon --}}
                    <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                         width="60">

                    <div>

                        <h5 class="fw-bold mb-1">

                            {{ $goal->title }}

                        </h5>

                        <small class="text-secondary">

                            Target
                            Rp {{ number_format(
                                $goal->target_amount,
                                0,
                                ',',
                                '.'
                            ) }}

                        </small>

                        <div class="progress mt-2"
                             style="width:250px;">

                            <div class="progress-bar"
                                 style="width:{{ $percentage }}%">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="text-end">

                    <h6 class="fw-bold">

                        Rp {{ number_format(
                            $goal->current_amount,
                            0,
                            ',',
                            '.'
                        ) }}

                    </h6>

                    <small class="text-secondary d-block">

                        {{ $percentage }}%

                    </small>

                    <small class="text-secondary d-block mb-3">

                        {{ ucfirst($goal->status) }}

                    </small>

                    <div class="d-flex gap-2 justify-content-end">

                        {{-- detail --}}
                        <a href="{{ route(
                            'goals.detail',
                            $goal->id
                        ) }}"
                        class="btn btn-sm btn-outline-primary rounded-pill px-3">

                            Detail

                        </a>

                        {{-- edit --}}
                        <a href="{{ route(
                            'goals.edit',
                            $goal->id
                        ) }}"
                        class="btn btn-sm text-white rounded-pill px-3"
                        style="background:#6f2cff;">

                            Edit

                        </a>

                    </div>

                </div>

            </div>

        </x-ui.card.default>

    @empty

        <x-ui.card.default>

            <div class="text-center py-5">

                <h5 class="fw-bold">
                    No Goals Yet
                </h5>

                <p class="text-secondary">
                    Start creating your first saving goal.
                </p>

            </div>

        </x-ui.card.default>

    @endforelse

</div>

@endsection