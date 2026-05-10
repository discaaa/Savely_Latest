@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Edit Expense
        </h2>

        <p class="text-muted mb-0">
            Record your new expense
        </p>

    </div>

    <x-ui.card.default>

        <form>

            <div class="mb-3">

                <label class="form-label">
                    Amount
                </label>

                <x-ui.input.input
                    type="number"
                    placeholder="Enter amount"
                />

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Category
                </label>

                <x-ui.input.select>

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

            <div class="mb-3">

                <label class="form-label">
                    Date
                </label>

                <x-ui.input.input
                    type="date"
                />

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Notes
                </label>

                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Optional notes..."
                ></textarea>

            </div>

            <div class="d-flex gap-2">

                <x-ui.button.primary>
                    Save Expense
                </x-ui.button.primary>

                <a href="{{ route('expense.index') }}">

                    <button
                        type="button"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </button>

                </a>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection