@extends('components.layout.sidebar')

@section('content')

<style>

    .history-card{
        border: 2px solid #a855f7;
        border-radius: 18px;
        background: white;
        padding: 18px;
    }

</style>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <h2 class="fw-bold">
            Goal History
        </h2>

        <select class="form-select"
                style="width:220px;">
            <option>All Transactions</option>
        </select>

    </div>

    @for($i = 0; $i < 5; $i++)

    <div class="mb-4">

        <h6 class="fw-bold">
            21 January 2026
        </h6>

        <div class="history-card">

            <h5 class="text-success fw-bold">
                + Rp 500.000
            </h5>

            <small>Weekly saving</small>

        </div>

    </div>

    @endfor

    <div class="text-center mt-5">

        <button class="btn btn-outline-primary px-5">
            Load More
        </button>

    </div>

</div>

@endsection