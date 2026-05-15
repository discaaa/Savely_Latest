@extends('components.layout.sidebar')

@section('content')

<div class="container">

    <div class="card border-0 shadow-lg rounded-4 p-4">

        <h2 class="fw-bold mb-4">
            Edit Budget
        </h2>

        <form>

            <div class="mb-3">

                <label>Budget Name</label>

                <input type="text"
                       class="form-control"
                       value="Monthly Budget">

            </div>

            <div class="mb-3">

                <label>Total Amount</label>

                <input type="number"
                       class="form-control"
                       value="8000000">

            </div>

            <div class="mb-4">

                <label>Categories</label>

                <textarea class="form-control"
                          rows="5"></textarea>

            </div>

            <div class="d-flex justify-content-between">

                <a href="/budget" class="btn btn-outline-danger">
                    Delete Budget
                </a>

                <a href="/budget" class="btn btn-primary">
                    Update Budget
                </a>

            </div>

        </form>

    </div>

</div>

@endsection