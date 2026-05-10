@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            History
        </h2>

        <p class="text-muted mb-0">
            View all your recent activities
        </p>

    </div>

    {{-- FILTER --}}
    <x-ui.card.default class="mb-4">

        <div class="row g-3">

            <div class="col-md-4">

                <x-ui.input.input
                    type="text"
                    placeholder="Search activity..."
                />

            </div>

            <div class="col-md-4">

                <x-ui.input.select>

                    <option>
                        All Activities
                    </option>

                    <option>
                        Expense
                    </option>

                    <option>
                        Saving
                    </option>

                    <option>
                        Goal
                    </option>

                    <option>
                        Challenge
                    </option>

                </x-ui.input.select>

            </div>

            <div class="col-md-4">

                <x-ui.input.input
                    type="date"
                />

            </div>

        </div>

    </x-ui.card.default>

    {{-- HISTORY TABLE --}}
    <x-ui.card.default>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- EXPENSE --}}
                    <tr>

                        <td>
                            Added Food Expense
                        </td>

                        <td>

                            <x-ui.badge.expense>
                                Expense
                            </x-ui.badge.expense>

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

                    {{-- SAVING --}}
                    <tr>

                        <td>
                            Added Weekly Saving
                        </td>

                        <td>

                            <x-ui.badge.saving>
                                Saving
                            </x-ui.badge.saving>

                        </td>

                        <td>
                            9 Mei 2026
                        </td>

                        <td>

                            <span class="text-success fw-semibold">
                                Completed
                            </span>

                        </td>

                    </tr>

                    {{-- GOAL --}}
                    <tr>

                        <td>
                            Goal Progress Updated
                        </td>

                        <td>

                            <x-ui.badge.income>
                                Goal
                            </x-ui.badge.income>

                        </td>

                        <td>
                            8 Mei 2026
                        </td>

                        <td>

                            <span class="text-primary fw-semibold">
                                Updated
                            </span>

                        </td>

                    </tr>

                    {{-- CHALLENGE --}}
                    <tr>

                        <td>
                            Challenge Completed
                        </td>

                        <td>

                            <x-ui.badge.income>
                                Challenge
                            </x-ui.badge.income>

                        </td>

                        <td>
                            7 Mei 2026
                        </td>

                        <td>

                            <span class="text-warning fw-semibold">
                                Reward Earned
                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-ui.card.default>

</div>

@endsection