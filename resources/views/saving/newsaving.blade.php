@extends('components.layout.sidebar')

@section('content')

<style>

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 15px;
        padding: 10px 30px;
        font-weight: bold;
    }

</style>

<div class="container py-4">

    <x-ui.card.default>

        <div class="d-flex justify-content-between mb-4">

            <h2 class="fw-bold">
                Add New Saving
            </h2>

            <img src="https://cdn-icons-png.flaticon.com/512/8079/8079154.png"
                 width="50">

        </div>

        {{-- icon --}}
        <div class="text-center mb-4">

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                 width="100">

            <p class="text-primary fw-bold mt-2">
                Record Your Saving
            </p>

        </div>

        <form action="{{ route('saving.store') }}"
              method="POST">

            @csrf

            {{-- Goal --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Saving Goal
                </label>

                <select name="goal_id"
                        class="form-select"
                        required>

                    <option value="">
                        Choose Your Goal
                    </option>

                    @foreach($goals as $goal)

                        <option value="{{ $goal->id }}">
                            {{ $goal->title }}
                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Amount --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Amount
                </label>

                <input type="number"
                       name="amount"
                       class="form-control"
                       placeholder="Rp 0"
                       required>

            </div>

            {{-- Saving Date --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Saving Date
                </label>

                <input type="date"
                       name="saving_date"
                       class="form-control"
                       required>

            </div>

            {{-- Saving Method --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Saving Method
                </label>

                <select name="method"
                        class="form-select"
                        required>

                    <option value="Cash">
                        Cash
                    </option>

                    <option value="Bank Transfer">
                        Bank Transfer
                    </option>

                    <option value="E-Wallet">
                        E-Wallet
                    </option>

                </select>

            </div>

            {{-- Notes --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Notes
                </label>

                <textarea name="note"
                          class="form-control"
                          rows="4"
                          placeholder="Write additional notes..."></textarea>

            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-between">

                <a href="{{ route('saving.daily') }}"
                   class="btn btn-outline-secondary">

                    Cancel

                </a>

                <button type="submit"
                        class="purple-btn">

                    Add Saving

                </button>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection