@extends('components.layout.sidebar')

@section('content')

<div class="container">

    <div class="card border-0 shadow-lg rounded-4 p-4">

        <h2 class="fw-bold mb-4">
            Create New Budget
        </h2>

        <form>

            <div class="mb-3">
                <label>Budget Name</label>
                <input type="text"
                       class="form-control"
                       placeholder="Monthly Budget">
            </div>

            <div class="mb-3">
                <label>Total Amount</label>
                <input type="number"
                       class="form-control">
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Period</label>

                    <select class="form-select">
                        <option>Monthly</option>
                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Start Date</label>

                    <input type="date"
                           class="form-control">

                </div>

            </div>

            <a href="/budget" class="btn btn-primary">
                Create Budget
            </a>

        </form>

    </div>

</div>

@endsection