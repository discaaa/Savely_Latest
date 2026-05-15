@extends('components.layout.sidebar')

@section('content')

<style>

    .stats-card{
        background: #f8f6ff;
        border-radius: 18px;
        padding: 20px;
    }

    .budget-card{
        border: 2px solid #a855f7;
        border-radius: 20px;
        background: white;
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border-radius: 15px;
        padding: 10px 20px;
        border: none;
        font-weight: bold;
    }

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">My Budgets</h2>
            <p class="text-secondary">
                Plan your spending, stay on track.
            </p>
        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="budget/create"
               class="purple-btn text-decoration-none">
                + New Budget
            </a>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="50">

        </div>

    </div>

    {{-- STATS --}}
    <div class="row mb-5">

        <div class="col-md-3">
            <div class="stats-card">
                <small>Total Budget</small>
                <h3 class="fw-bold">Rp 8.000.000</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card">
                <small>Total Spent</small>
                <h3 class="fw-bold">Rp 4.250.000</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card">
                <small>Remaining</small>
                <h3 class="fw-bold">Rp 3.750.000</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card">
                <small>Categories</small>
                <h3 class="fw-bold">6</h3>
            </div>
        </div>

    </div>

    {{-- MAIN --}}
    <div class="row">

        {{-- LEFT --}}
        <div class="col-lg-5">

            <div class="budget-card p-4">

                <div class="text-center">

                    <div class="progress mx-auto mb-3 rounded-circle"
                         style="width:220px;height:220px;">

                        <div class="d-flex justify-content-center align-items-center w-100 h-100">

                            <div>
                                <h1 class="fw-bold">53%</h1>
                                <small>of budget used</small>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="mt-4">

                    <div class="d-flex justify-content-between mb-3">
                        <span>Food</span>
                        <span>62%</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Transport</span>
                        <span>50%</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Entertainment</span>
                        <span>40%</span>
                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-7">

            <h4 class="fw-bold mb-4">
                Budget Categories
            </h4>

            <div class="row">

                @for($i = 0; $i < 4; $i++)

                <div class="col-md-6 mb-4">

                    <div class="budget-card p-3">

                        <div class="d-flex justify-content-between">

                            <h5 class="fw-bold">
                                Food
                            </h5>

                            <span>50%</span>

                        </div>

                        <p class="text-secondary">
                            Rp 750.000 spent
                        </p>

                        <div class="progress"
                             style="height:10px;">

                            <div class="progress-bar bg-primary"
                                 style="width:50%">
                            </div>

                        </div>

                        <div class="mt-3 d-flex gap-2">

                            <a href="budget/detail"
                               class="btn btn-sm btn-outline-primary rounded-pill">
                                Detail
                            </a>

                            <a href="budget/history"
                                class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                    History
                            </a>

                            <a href="budget/edit"
                               class="btn btn-sm text-white rounded-pill"
                               style="background:#6f2cff;">
                                Edit
                            </a>

                        </div>

                    </div>

                </div>

                @endfor

            </div>

        </div>

    </div>

</div>

@endsection