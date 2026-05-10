@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Expense
            </h2>

            <p class="text-muted mb-0">
                Manage and track your expenses
            </p>

        </div>

        <a href="{{ route('expense.create') }}">

            <x-ui.button.primary>
                Add Expense
            </x-ui.button.primary>

        </a>

    </div>

    {{-- SUMMARY --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Monthly Expense
                </p>

                <h3 class="fw-bold">
                    Rp 2.500.000
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Highest Category
                </p>

                <h3 class="fw-bold">
                    Food
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">
                    Budget Used
                </p>

                <h3 class="fw-bold mb-3">
                    80%
                </h3>

                <x-ui.progress.progress
                    value="80"
                    color="warning"
                />

            </x-ui.card.default>

        </div>

    </div>

    {{-- FILTER --}}
    <x-ui.card.default class="mb-4">

        <div class="row g-3">

            <div class="col-md-4">

                <x-ui.input.input
                    type="text"
                    placeholder="Search expense..."
                />

            </div>

            <div class="col-md-4">

                <x-ui.input.select>

                    <option>
                        All Categories
                    </option>

                    <option>
                        Food
                    </option>

                    <option>
                        Transport
                    </option>

                    <option>
                        Shopping
                    </option>

                </x-ui.input.select>

            </div>

            <div class="col-md-4">

                <x-ui.input.input
                    type="month"
                />

            </div>

        </div>

    </x-ui.card.default>

    {{-- EXPENSE TABLE --}}
    <x-ui.card.default>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>
                            <x-ui.badge.expense>
                                Food
                            </x-ui.badge.expense>
                        </td>

                        <td>
                            Rp 50.000
                        </td>

                        <td>
                            10 Mei 2026
                        </td>

                        <td>
                            Lunch with friends
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="{{ route('expense.edit') }}">

                                    <x-ui.button.primary>
                                        Edit
                                    </x-ui.button.primary>

                                </a>

                            </div>

                        </td>

                    </tr>

                    <tr>

                        <td>
                            <x-ui.badge.expense>
                                Transport
                            </x-ui.badge.expense>
                        </td>

                        <td>
                            Rp 20.000
                        </td>

                        <td>
                            11 Mei 2026
                        </td>

                        <td>
                            GoRide
                        </td>

                        <td>

                            <x-ui.button.primary>
                                Edit
                            </x-ui.button.primary>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-ui.card.default>

</div>

@endsection