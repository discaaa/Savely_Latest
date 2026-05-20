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
                    Rp {{ number_format($totalExpense ?? 0, 0, ',', '.') }}
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Saving Progress
                </p>

                <h3 class="fw-bold">
                    {{ $savingProgress ?? 0 }}%
                </h3>

                <x-ui.progress.progress
                    value="{{ $savingProgress ?? 0 }}"
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
                    {{ $activeChallenges ?? 0 }} Challenges
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

            <a href="{{ url('saving/newsaving') }}">
                <x-ui.button.primary>
                    Add Saving
                </x-ui.button.primary>
            </a>

            <a href="{{ url('goals/create') }}">
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

                            @forelse($recentActivities ?? [] as $activity)
                                <tr>
                                    <td>
                                        {{ $activity['title'] }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($activity['date'])->format('d M Y') }}
                                    </td>
                                    <td>
                                        @if($activity['type'] == 'expense')
                                            <x-ui.badge.expense>
                                                Expense
                                            </x-ui.badge.expense>
                                        @else
                                            <x-ui.badge.saving>
                                                Saving
                                            </x-ui.badge.saving>
                                        @endif                                    
                                    </td>
                                </tr>
                            @empty
                                
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        No recent activity
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </x-ui.card.default>

        </div>

    </div>

</div>

@endsection