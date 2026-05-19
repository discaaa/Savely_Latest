@extends('components.layout.sidebar')

@section('content')

<style>

    .stats-card{
        background: #f8f6ff;
        border-radius: 18px;
        padding: 20px;
        border: 2px solid #6f2cff;
        box-shadow: 0 10px 12px rgba(169,108,255,0.1);
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

    .circular-progress{
    width: 220px;
    height: 220px;
    border-radius: 50%;

    background:
    conic-gradient(
        #8b5cf6 0% 53%,
        #e9dfff 53% 100%
    );

        display: flex;
        justify-content: center;
        align-items: center;

        position: relative;
    }

    .progress-inner{
        width: 170px;
        height: 170px;
        background: white;
        border-radius: 50%;

        display: flex;
        justify-content: center;
        align-items: center;

        text-align: center;
    }

    .small-progress{
    height: 10px;
    border-radius: 20px;
    overflow: hidden;
    background-color: #ece8ff;
    }

    .category-icon{
        width: 35px;
        height: 35px;
        border-radius: 12px;
        background: #f3eeff;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;
    }

</style>

<div class="container-fluid">
    {{-- header --}}
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

    {{-- stats --}}
    <div class="row mb-5">

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Total Budget</small>
                <h3 class="fw-bold">Rp 8.000.000</h3>
            </x-ui.card.default>
        </div>

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Total Spent</small>
                <h3 class="fw-bold">Rp 4.250.000</h3>
            </x-ui.card.default>
        </div>

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Remaining</small>
                <h3 class="fw-bold">Rp 3.750.000</h3>
            </x-ui.card.default>
        </div>

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Categories</small>
                <h3 class="fw-bold">6</h3>
            </x-ui.card.default>
        </div>
        <hr class="mt-4" style="border:5px solid #a855f7; border-radius:10px">
    </div>
    

    {{-- main content --}}
    <div class="row">

        {{-- kiri --}}
        <div class="col-lg-5">

            <div class="budget-card p-4">
                <div class="text-center">

                    <div class="circular-progress mx-auto mb-3">

                        <div class="progress-inner">
                            <div>
                                <h1 class="fw-bold mb-0">53%</h1>
                                <small>of budget used</small>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="mt-4 d-flex flex-column gap-4">
                    {{-- food --}}
                    <div>

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="d-flex align-items-center gap-2">
                                <span class="category-icon">🍔</span>
                                <span class="fw-semibold">Food</span>
                            </div>

                            <span class="fw-bold text-danger">62%</span>

                        </div>
                        <div class="progress small-progress">
                            <div class="progress-bar bg-danger"
                                style="width:62%">
                            </div>
                        </div>

                    </div>

                    {{-- transport --}}
                    <div>

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="d-flex align-items-center gap-2">
                                <span class="category-icon">🚗</span>
                                <span class="fw-semibold">Transport</span>
                            </div>

                            <span class="fw-bold text-warning">50%</span>

                        </div>

                        <div class="progress small-progress">
                            <div class="progress-bar bg-warning"
                                style="width:50%">
                            </div>
                        </div>

                    </div>

                    {{-- entertainment --}}
                    <div>

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="d-flex align-items-center gap-2">
                                <span class="category-icon">🎮</span>
                                <span class="fw-semibold">Entertainment</span>
                            </div>

                            <span class="fw-bold text-success">40%</span>

                        </div>

                        <div class="progress small-progress">
                            <div class="progress-bar bg-success"
                                style="width:40%">
                            </div>
                        </div>

                    </div>

                    {{-- other spending --}}
                    <div>

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="d-flex align-items-center gap-2">
                                <span class="category-icon">🐣</span>
                                <span class="fw-semibold">Others</span>
                            </div>

                            <span class="fw-bold text-success">20%</span>

                        </div>

                        <div class="progress small-progress">
                            <div class="progress-bar bg-success"
                                style="width:20%">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        {{-- kanan --}}
        <div class="col-lg-7">

            <h4 class="fw-bold mb-4">
                Budget Categories
            </h4>

            <div class="row">
                {{-- nanti diganti sesuai kategori database --}}
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

                            <a href="budget/historybudget"
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