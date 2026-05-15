@extends('components.layout.sidebar')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <div>
            <h2 class="fw-bold">
                Monthly Budget
            </h2>

            <small class="text-secondary">
                February 2026
            </small>
        </div>

        <a href="/budget/edit"
           class="btn btn-outline-primary">
            Edit
        </a>

    </div>

    <div class="card border-0 shadow rounded-4 p-4">

        <div class="row text-center mb-5">

            <div class="col-md-4">
                <small>Total Budget</small>
                <h4 class="fw-bold">Rp 8.000.000</h4>
            </div>

            <div class="col-md-4">
                <small>Total Spent</small>
                <h4 class="fw-bold">Rp 4.250.000</h4>
            </div>

            <div class="col-md-4">
                <small>Remaining</small>
                <h4 class="fw-bold">Rp 3.750.000</h4>
            </div>

        </div>

        <div class="progress mb-5"
             style="height:14px;">

            <div class="progress-bar bg-primary"
                 style="width:53%">
            </div>

        </div>

        @for($i = 0; $i < 5; $i++)

        <div class="mb-4">

            <div class="d-flex justify-content-between">

                <h5>Food</h5>

                <span>50%</span>

            </div>

            <div class="progress"
                 style="height:10px;">

                <div class="progress-bar bg-primary"
                     style="width:50%">
                </div>

            </div>

        </div>

        @endfor

    </div>

</div>

@endsection