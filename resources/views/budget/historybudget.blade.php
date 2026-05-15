@extends('components.layout.sidebar')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-5">

        <h2 class="fw-bold">
            Budget History
        </h2>

        <select class="form-select"
                style="width:200px;">
            <option>All Categories</option>
        </select>

    </div>

    @for($i = 0; $i < 5; $i++)

    <div class="card rounded-4 shadow-sm border-0 p-3 mb-3">

        <div class="d-flex justify-content-between">

            <div>

                <h5 class="text-danger fw-bold">
                    - Rp 50.000
                </h5>

                <small>Lunch</small>

            </div>

            <span class="badge bg-danger">
                Food
            </span>

        </div>

    </div>

    @endfor

</div>

@endsection