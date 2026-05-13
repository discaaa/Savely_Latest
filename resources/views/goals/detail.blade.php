@extends('components.layout.sidebar')

@section('content')

<style>

    .purple-btn{
        background: #6f2cff;
        color: white;
        border-radius: 12px;
        padding: 10px 25px;
        border: none;
        font-weight: bold;
    }

    .outline-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        border-radius: 12px;
        padding: 10px 25px;
        background: white;
        font-weight: bold;
    }

</style>

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <div>
            <h2 class="fw-bold">New Laptop</h2>
            <small class="text-primary">
                In Progress
            </small>
        </div>

        <div class="d-flex gap-3">
            <i class="bi bi-pencil-square"></i>
            <i class="bi bi-three-dots"></i>
        </div>

    </div>

    <x-ui.card.default>

        <div class="row align-items-center">

            <div class="col-md-5 text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                     width="180">

            </div>

            <div class="col-md-7">

                <h6>Target Amount</h6>
                <h3 class="fw-bold">Rp 10.000.000</h3>

                <h6 class="mt-4">Saved Amount</h6>
                <h3 class="fw-bold">Rp 6.200.000</h3>

                <h6 class="mt-4">Progress</h6>
                <h3 class="fw-bold">62%</h3>

                <div class="progress mb-3"
                     style="height:12px;">

                    <div class="progress-bar bg-primary"
                         style="width:62%">
                    </div>

                </div>

                <div class="d-flex gap-3">

                    <button class="purple-btn">
                        Add Saving
                    </button>

                    <button class="outline-btn">
                        Withdraw
                    </button>

                </div>

            </div>

        </div>

    </x-ui.card.default>

</div>

@endsection