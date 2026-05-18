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

        <form>

            {{-- Saving Title --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Saving Name
                </label>

                <input type="text"
                       class="form-control"
                       placeholder="Eg. January Saving">
            </div>

            {{-- Amount --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Amount
                </label>

                <input type="number"
                       class="form-control"
                       placeholder="Rp 0">
            </div>

            {{-- Date --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Saving Date
                </label>

                <input type="date"
                       class="form-control">
            </div>

            {{-- Method --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Saving Method
                </label>

                <select class="form-select">
                    <option>Cash</option>
                    <option>Bank Transfer</option>
                    <option>E-Wallet</option>
                </select>

            </div>

            {{-- Note --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Notes
                </label>

                <textarea class="form-control"
                          rows="4"
                          placeholder="Write additional notes..."></textarea>

            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-between">

                <a href="/daily"
                   class="btn btn-outline-secondary">
                    Cancel
                </a>

                <a href="/daily" class="purple-btn text-decoration-none">
                    Add Saving
                </a>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection