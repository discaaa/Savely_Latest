@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Edit Expense
        </h2>

        <p class="text-muted mb-0">
            Update your expense data
        </p>

    </div>

    <x-ui.card.default>

        <form action="{{ route('expense.update', $expense->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Amount
                </label>

                <x-ui.input.input
                    type="number"
                    name="amount"
                    value="{{ $expense->amount }}"
                />

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Category
                </label>

                <x-ui.input.select name="category">

                    <option value="Food" {{ $expense->category == 'Food' ? 'selected' : '' }}>
                        Food
                    </option>

                    <option value="Transport" {{ $expense->category == 'Transport' ? 'selected' : '' }}>
                        Transport
                    </option>

                    <option value="Shopping" {{ $expense->category == 'Shopping' ? 'selected' : '' }}>
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
                    name="date"
                    value="{{ $expense->date }}"
                />

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Notes
                </label>

                <textarea class="form-control"
                          name="description"
                          rows="4">{{ $expense->description }}</textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Purpose
                </label>

                <x-ui.input.input
                    type="text"
                    name="purpose"
                    value="{{ $expense->purpose }}"
                />

            </div>

            <div class="d-flex gap-2">

                <x-ui.button.primary>
                    Save Expense
                </x-ui.button.primary>

                <a href="{{ route('expense.index') }}">
                    <button type="button" class="btn btn-secondary">
                        Cancel
                    </button>
                </a>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection