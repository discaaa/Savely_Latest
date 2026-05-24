@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Challenges
        </h2>

        <p class="text-muted mb-0">
            Complete challenges and earn rewards
        </p>

    </div>

    {{-- SUMMARY --}}
    <div class="row g-4 mb-4">

        {{-- ACTIVE CHALLENGES --}}
        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Active Challenges
                </p>

                <h3 class="fw-bold">
                    {{ $challenges->where('status', 'active')->count() }}
                </h3>

            </x-ui.card.default>

        </div>

        {{-- CURRENT STREAK --}}
        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Current Streak
                </p>

                <h3 class="fw-bold">
                    7 Days 🔥
                </h3>

            </x-ui.card.default>

        </div>

        {{-- REWARD POINTS --}}
        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Reward Points
                </p>

                <h3 class="fw-bold">
                    {{ $challenges->sum('reward_points') }} Points
                </h3>

            </x-ui.card.default>

        </div>

    </div>

    {{-- ACTIVE CHALLENGES --}}
    <div class="row g-4 mb-4">

        @foreach($challenges->where('status', 'active') as $challenge)

            <div class="col-md-6">

                <x-ui.card.default>

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            {{ $challenge->title }}
                        </h5>

                        <x-ui.badge.saving>
                            Active
                        </x-ui.badge.saving>

                    </div>

                    <p class="text-muted">
                        {{ $challenge->description }}
                    </p>

                    <div class="fw-semibold text-success mb-2">
                        Reward:
                        {{ $challenge->reward_points }} Points
                    </div>

                    <x-ui.progress.progress
                        value="70"
                        color="success"
                    />

                    <small class="text-muted">
                        Challenge in Progress
                    </small>

                </x-ui.card.default>

            </div>

        @endforeach

    </div>

    {{-- COMPLETED CHALLENGES --}}
    <x-ui.card.default>

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="fw-bold mb-0">
                Completed Challenges
            </h5>

            <span class="text-muted">
                Last 30 Days
            </span>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Challenge</th>
                        <th>Reward</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($challenges->where('status', 'completed') as $challenge)

                        <tr>

                            <td>
                                {{ $challenge->title }}
                            </td>

                            <td>
                                +{{ $challenge->reward_points }} Points
                            </td>

                            <td>
                                {{ $challenge->created_at->format('d M Y') }}
                            </td>

                            <td>

                                <span class="text-success fw-semibold">
                                    Completed
                                </span>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </x-ui.card.default>

</div>

@endsection