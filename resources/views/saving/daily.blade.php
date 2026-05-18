@extends('components.layout.sidebar')

@section('content')

<style>
    body{
        background-color: #f5f5f5;
    }

    .saving-btn{
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 600;
    }

    .active-saving{
        background-color: #6f2cff;
        color: white;
        border: none;
    }

    .inactive-saving{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        background: white;
    }

    .purple-text{
        color: #6f2cff;
        font-size: 25px;
    }

    .progress{
        border-radius: 20px;
        overflow: hidden;
        background-color: #e9ecef;
    }

    .progress-bar{
        font-weight: bold;
    }

    .green-bar{
        background-color: #63ff00;
        color: black;
    }

    .purple-bar{
        background-color: #9b5cff;
        color: black;
    }

    .status-dot{
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: inline-block;
    }

    .dot-green{
        background-color: #0db14b;
    }

    .dot-red{
        background-color: red;
    }

    .small-progress{
        height: 22px;
    }

    .badge-soft{
        background-color: #b8f28b;
        color: #3b3b3b;
        border-radius: 10px;
        padding: 4px 12px;
        font-size: 14px;
    }

    .danger-soft{
        background-color: #ff8f8f;
        color: #912020;
        border-radius: 10px;
        padding: 4px 12px;
        font-size: 14px;
    }

    .saving-bottom-btn{
        position: fixed;
        bottom: 30px;
        right: 40px;
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 14px 22px;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

</style>

<div class="container-fluid">

    {{-- Button Atas --}}
    <div class="d-flex justify-content-end align-items-center gap-3 mb-4">

        <a href="/daily" class="btn saving-btn active-saving">
            Daily Saving
        </a>

        <a href="/goalsave" class="btn saving-btn inactive-saving">
            Goals Saving
        </a>

        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
             width="55"
             class="rounded-circle border p-1">
    </div>

    <div class="row g-4">

        {{-- Section Kiri --}}
        <div class="col-lg-5">

            {{-- Account Card --}}
            <x-ui.card.default>
                <h2 class="fw-bold">Account name</h2>

                <p class="mb-1">January Saving</p>

                <h1 class="fw-bold">
                    Rp 2.400.000
                </h1>
            </x-ui.card.default>

            {{-- This Month (Integrate Database) --}}
            <x-ui.card.default>

                <h2 class="fw-bold mb-4">
                    This month 
                </h2>

                <h4 class="fw-bold">
                    Rp 1.200.000 / 3.200.000
                </h4>

                <div class="d-flex align-items-center gap-2 mt-4">

                    <span class="badge-soft">
                        +20% from last week
                    </span>

                    <div class="progress flex-grow-1" style="height:20px;">
                        <div class="progress-bar purple-bar"
                             style="width:65%">
                            65%
                        </div>
                    </div>

                </div>
            </x-ui.card.default>

            {{-- Used Saving --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <h2 class="fw-bold">
                    Used Saving
                </h2>

                <x-ui.button.primary>
                    Add Used Saving +
                </x-ui.button.primary>

            </div>

            {{-- Contoh : Food - Integrate Database --}}
            <x-ui.card.default>

                <h2 class="fw-bold">
                    Food
                </h2>

                <h4 class="fw-bold mb-4">
                    Rp 325.000 / 500.000
                </h4>

                <div class="d-flex align-items-center gap-3">

                    <div class="progress flex-grow-1 small-progress">
                        <div class="progress-bar bg-danger"
                             style="width:65%">
                            +5% per day
                        </div>
                    </div>

                    <span>
                        🟡 Medium
                    </span>

                </div>
            </x-ui.card.default>

            {{-- Shopping - Integrate Database --}}
            <div class="custom-card p-4">

                <h2 class="fw-bold">
                    Shopping
                </h2>

                <h4 class="fw-bold mb-4">
                    Rp 350.000 / 500.000
                </h4>

                <div class="d-flex align-items-center gap-3">

                    <div class="progress flex-grow-1 small-progress">
                        <div class="progress-bar bg-danger"
                             style="width:85%">
                            +30% per day
                        </div>
                    </div>

                    <span class="text-danger fw-bold">
                        🔴 High Spending
                    </span>

                </div>
            </div>
        </div>

        {{-- Section Kanan --}}
        <div class="col-lg-7">

            {{-- January Spending Card --}}
            <x-ui.card.default>

                <h2 class="fw-bold mb-5">
                    January 2026
                </h2>

                {{-- Week1 --}}
                <div class="row align-items-center mb-4">

                    <div class="col-2">
                        <h3 class="purple-text fw-bold">
                            Week 1
                        </h3>
                    </div>

                    <div class="col-9">
                        <div class="progress" style="height:32px;">
                            <div class="progress-bar green-bar"
                                 style="width:100%">
                                100%
                            </div>
                        </div>
                    </div>

                    <div class="col-1">
                        <span class="status-dot dot-green"></span>
                    </div>
                </div>

                {{-- Week 2 --}}
                <div class="row align-items-center mb-4">

                    <div class="col-2">
                        <h3 class="purple-text fw-bold">
                            Week 2
                        </h3>
                    </div>

                    <div class="col-9">
                        <div class="progress" style="height:32px;">
                            <div class="progress-bar green-bar"
                                 style="width:80%">
                                80%
                            </div>
                        </div>
                    </div>

                    <div class="col-1">
                        <span class="status-dot dot-red"></span>
                    </div>
                </div>

                {{-- Week 3 --}}
                <div class="row align-items-center mb-4">

                    <div class="col-2">
                        <h3 class="purple-text fw-bold">
                            Week 3
                        </h3>
                    </div>

                    <div class="col-9">
                        <div class="progress" style="height:32px;">
                            <div class="progress-bar purple-bar"
                                 style="width:85%">
                                On Progress 85%
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Week 4 --}}
                <div class="row align-items-center">

                    <div class="col-2">
                        <h3 class="purple-text fw-bold">
                            Week 4
                        </h3>
                    </div>

                    <div class="col-9">
                        <div class="progress" style="height:32px;">
                            <div class="progress-bar bg-secondary"
                                 style="width:10%">
                            </div>
                        </div>
                    </div>
                </div>

            </x-ui.card.default>

            {{-- Card Edu + Transport --}}
            <div class="row g-4">

                {{-- Edu --}}
                <div class="col-md-6">

                    <x-ui.card.default>

                        <h2 class="fw-bold">
                            Education
                        </h2>

                        <h4 class="fw-bold mb-4">
                            Rp 730.900 / 2.000.000
                        </h4>

                        <div class="d-flex align-items-center gap-3">

                            <div class="progress flex-grow-1 small-progress">

                                <div class="progress-bar bg-success"
                                     style="width:60%">
                                    normal
                                </div>

                            </div>

                            <span class="text-success fw-bold">
                                🟢 Low Spending
                            </span>

                        </div>

                    </x-ui.card.default>
                </div>

                {{-- Transport --}}
                <div class="col-md-6">

                    <x-ui.card.default>

                        <h2 class="fw-bold">
                            Transportation
                        </h2>

                        <h4 class="fw-bold mb-4">
                            Rp 30.000 / 100.000
                        </h4>

                        <div class="d-flex align-items-center gap-3">

                            <div class="progress flex-grow-1 small-progress">

                                <div class="progress-bar bg-success"
                                     style="width:40%">
                                    normal
                                </div>

                            </div>

                            <span class="text-success fw-bold">
                                🟢 Low Spending
                            </span>

                        </div>

                    </x-ui.card.default>
                </div>

            </div>

        </div>

    </div>
    <a href="saving/newsaving" class="saving-bottom-btn text-decoration-none">
        + Add New Saving
    </a>
</div>

@endsection