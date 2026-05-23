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
                Create New Goal
            </h2>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="50">

        </div>

        {{-- image icon --}}
        <div class="text-center mb-4">

            <img src="https://cdn-icons-png.flaticon.com/512/1829/1829586.png"
                 width="120">

            <p class="text-primary fw-bold mt-2">
                Create Your Saving Goal
            </p>

        </div>

        {{-- error --}}
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('goals.store') }}"
              method="POST">

            @csrf

            {{-- Goal Name --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Goal Name
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Eg. New Laptop"
                       required>

            </div>

            {{-- Target Amount --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Target Amount
                </label>

                <input type="number"
                       name="target_amount"
                       class="form-control"
                       placeholder="Rp 0"
                       required>

            </div>

            {{-- Current Amount --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Initial Saving
                </label>

                <input type="number"
                       name="current_amount"
                       class="form-control"
                       placeholder="Rp 0">

            </div>

            {{-- Status --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Status
                </label>

                <select name="status"
                        class="form-select">

                    <option value="ongoing">
                        Ongoing
                    </option>

                    <option value="completed">
                        Completed
                    </option>

                </select>

            </div>

            {{-- Description --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Description
                </label>

                <textarea name="description"
                          class="form-control"
                          rows="5"
                          placeholder="Write your goal description..."></textarea>

            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-between">

                <a href="{{ route('goals.index') }}"
                   class="btn btn-outline-secondary">

                    Cancel

                </a>

                <button type="submit"
                        class="purple-btn">

                    Create Goal

                </button>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection