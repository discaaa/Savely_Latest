@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Add Expense
        </h2>

        <p class="text-muted mb-0">
            Record your new expense
        </p>

    </div>

    <x-ui.card.default>

        <form action="{{ route('expense.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Amount
        </label>

        <x-ui.input.input
            type="number"
            name="amount"
            placeholder="Enter amount"
        />

    </div>

    <div class="mb-3">

        <label class="form-label">
            Category
        </label>

        <x-ui.input.select name="category">

            <option value="Food">
                Food
            </option>

            <option value="Transport">
                Transport
            </option>

            <option value="Shopping">
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
        />

    </div>

    <div class="mb-3">

        <label class="form-label">
            Description
        </label>

        <textarea
            class="form-control"
            rows="3"
            name="description"
        ></textarea>

    </div>

    <div class="mb-4">

        <label class="form-label">
            Purpose
        </label>

        <textarea
            class="form-control"
            rows="3"
            name="purpose"
        ></textarea>

    </div>

    <div class="d-flex gap-2">

        <button
            type="submit"
            class="btn btn-primary"
        >
            Save Expense
        </button>

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