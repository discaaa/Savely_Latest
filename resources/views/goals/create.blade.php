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
                Upload Goal Image
            </p>

        </div>

        <form>

            <div class="mb-3">
                <label class="form-label">Goal Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="Eg. New Laptop">
            </div>

            <div class="mb-3">
                <label class="form-label">Target Amount</label>
                <input type="number"
                       class="form-control"
                       placeholder="Rp 0">
            </div>

            <div class="mb-3">
                <label class="form-label">Target Date</label>
                <input type="date"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>

                <select class="form-select">
                    <option>Electronics</option>
                    <option>Travel</option>
                    <option>Education</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Description</label>

                <textarea class="form-control"
                          rows="5"></textarea>
            </div>

            <div class="d-flex justify-content-between">

                <a href="/goals" class="btn btn-outline-secondary">
                    Cancel
                </button>

                <a href="/goals" class="purple-btn text-decoration-none">
                    Create Goal
                </a>
                {{-- abis itu keupdate --}}

            </div>

        </form>

    </x-ui.card.default>

</div>

@endsection