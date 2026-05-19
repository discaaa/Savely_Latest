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

        <form>

            <div class="mb-3">
                <label class="form-label">
                    Goal Name
                </label>

                <input type="text"
                       class="form-control"
                       value="New Laptop">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Target Amount
                </label>

                <input type="number"
                       class="form-control"
                       value="10000000">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Target Date
                </label>

                <input type="date"
                       class="form-control">
            </div>

            <div class="mb-3">

                <label class="form-label">
                    Category
                </label>

                <select class="form-select">
                    <option>Electronics</option>
                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Description
                </label>

                <textarea class="form-control"
                          rows="5">I want to buy a new laptop for work and study.</textarea>

            </div>

            <div class="d-flex justify-content-between">

                <button class="btn btn-outline-danger">
                    Delete Goal
                </button>

                <a href="/goals" class="purple-btn text-decoration-none">
                    Update Goal
                </a>

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection