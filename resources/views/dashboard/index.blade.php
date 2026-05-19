@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Dashboard
        </h2>

        <p class="text-muted mb-0">
            Welcome back! Here's your financial summary.
        </p>

    </div>

    {{-- SUMMARY CARDS --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Total Expense
                </p>

                <h3 class="fw-bold">
                    Rp 2.500.000
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Saving Progress
                </p>

                <h3 class="fw-bold">
                    65%
                </h3>

                <x-ui.progress.progress
                    value="65"
                    color="success"
                />

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Active Challenges
                </p>

                <h3 class="fw-bold">
                    3 Challenges
                </h3>

            </x-ui.card.default>

        </div>

    </div>

    {{-- QUICK ACCESS --}}
    <div class="mb-4">

        <h5 class="fw-bold mb-3">
            Quick Access
        </h5>

        <div class="d-flex gap-3 flex-wrap">

            <a href="{{ route('expense.create') }}">
                <x-ui.button.primary>
                    Add Expense
                </x-ui.button.primary>
            </a>
{{-- SINI  --}}
            <a href="saving/newsaving">
                <x-ui.button.primary>
                    Add Saving
                </x-ui.button.primary>
            </a>

            <a href="goals/create">
                <x-ui.button.primary>
                    Create Goal
                </x-ui.button.primary>
            </a>

        </div>

    </div>

    {{-- BOTTOM SECTION --}}
    <div class="row g-4">

        {{-- GOALS --}}
        <div class="col-md-4">

            <x-ui.card.default>

                <h5 class="fw-bold mb-3">
                    Goals Progress
                </h5>

                <p class="mb-2">
                    New Laptop
                </p>

                <x-ui.progress.progress
                    value="70"
                    color="primary"
                />

                <small class="text-muted">
                    Rp 7.000.000 / Rp 10.000.000
                </small>

            </x-ui.card.default>

        </div>

        {{-- RECENT ACTIVITY --}}
        <div class="col-md-8">

            <x-ui.card.default>

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h5 class="fw-bold mb-0">
                        Recent Activity
                    </h5>

                    <a href="{{ route('history.index') }}"
                       class="text-decoration-none">
                        View All
                    </a>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>

                                <td>
                                    Added Food Expense
                                </td>

                                <td>
                                    10 Mei 2026
                                </td>

                                <td>
                                    <x-ui.badge.expense>
                                        Expense
                                    </x-ui.badge.expense>
                                </td>

                            </tr>

                            <tr>

                                <td>
                                    Saving Added
                                </td>

                                <td>
                                    9 Mei 2026
                                </td>

                                <td>
                                    <x-ui.badge.saving>
                                        Saving
                                    </x-ui.badge.saving>
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </x-ui.card.default>

        </div>

    </div>

</div>

@endsection