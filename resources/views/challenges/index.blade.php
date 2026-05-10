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

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Active Challenges
                </p>

                <h3 class="fw-bold">
                    3
                </h3>

            </x-ui.card.default>

        </div>

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

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Reward Points
                </p>

                <h3 class="fw-bold">
                    450 Points
                </h3>

            </x-ui.card.default>

        </div>

    </div>

    {{-- ACTIVE CHALLENGES --}}
    <div class="row g-4 mb-4">

        {{-- CARD 1 --}}
        <div class="col-md-6">

            <x-ui.card.default>

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h5 class="fw-bold mb-0">
                        Save Money Challenge
                    </h5>

                    <x-ui.badge.saving>
                        Active
                    </x-ui.badge.saving>

                </div>

                <p class="text-muted">
                    Save money for 7 days continuously
                </p>

                <x-ui.progress.progress
                    value="70"
                    color="success"
                />

                <small class="text-muted">
                    5 / 7 Days Completed
                </small>

            </x-ui.card.default>

        </div>

        {{-- CARD 2 --}}
        <div class="col-md-6">

            <x-ui.card.default>

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h5 class="fw-bold mb-0">
                        Budget Control
                    </h5>

                    <x-ui.badge.expense>
                        Ongoing
                    </x-ui.badge.expense>

                </div>

                <p class="text-muted">
                    Stay below your weekly budget
                </p>

                <x-ui.progress.progress
                    value="45"
                    color="warning"
                />

                <small class="text-muted">
                    45% Budget Used
                </small>

            </x-ui.card.default>

        </div>

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

                    <tr>

                        <td>
                            Daily Saving Challenge
                        </td>

                        <td>
                            +100 Points
                        </td>

                        <td>
                            10 Mei 2026
                        </td>

                        <td>

                            <span class="text-success fw-semibold">
                                Completed
                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>
                            Weekly Budget Challenge
                        </td>

                        <td>
                            +150 Points
                        </td>

                        <td>
                            5 Mei 2026
                        </td>

                        <td>

                            <span class="text-success fw-semibold">
                                Completed
                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-ui.card.default>

</div>

@endsection