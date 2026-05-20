@extends('components.layout.sidebar')

@section('content')

<style>

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 25px;
        font-weight: bold;
    }

</style>

<div class="container py-4">

    <x-ui.card.default>

        <div class="d-flex justify-content-between mb-4">

            <h2 class="fw-bold">
                Edit Goal
            </h2>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="50">

        </div>

        <div class="text-center mb-4">

            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                 width="120">

            <p class="text-primary fw-bold mt-3">
                Change Image
            </p>

        </div>

        {{-- FORM CONNECT DATABASE --}}
        <form method="POST" action="{{ route('goals.update', $goal->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Goal Name</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $goal->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Target Amount</label>

                <input type="number"
                       name="target_amount"
                       class="form-control"
                       value="{{ $goal->target_amount }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Target Date</label>

                <input type="date"
                       name="target_date"
                       class="form-control"
                       value="{{ $goal->target_date }}">
            </div>

            <div class="mb-3">

                <label class="form-label">Category</label>

                <select class="form-select" name="category">
                    <option value="Electronics"
                        {{ $goal->category == 'Electronics' ? 'selected' : '' }}>
                        Electronics
                    </option>

                    <option value="Travel"
                        {{ $goal->category == 'Travel' ? 'selected' : '' }}>
                        Travel
                    </option>

                    <option value="Other"
                        {{ $goal->category == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>
                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">Description</label>

                <textarea class="form-control"
                          name="description"
                          rows="5">{{ $goal->description }}</textarea>

            </div>

            <div class="d-flex justify-content-between">

                <form method="POST" action="{{ route('goals.destroy', $goal->id) }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger">
                        Delete Goal
                    </button>
                </form>

                <button type="submit" class="purple-btn">
                    Update Goal
                </button>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection