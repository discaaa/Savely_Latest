@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .form-card{
        background: white;
        border-radius: 28px;
        padding: 32px;
        border: 1px solid #ede9fe;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border: none;
        border-radius: 16px;
        padding: 12px 28px;
        font-weight: bold;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(111,44,255,0.18);
    }

    .purple-btn:hover{
        background: #5b21b6;
        transform: translateY(-2px);
    }

    .delete-btn{
        border: 2px solid #ef4444;
        border-radius: 16px;
        padding: 12px 24px;
        font-weight: 700;
        background: white;
        color: #ef4444;
        text-decoration: none;
        transition: 0.3s;
    }

    .delete-btn:hover{
        background: #fef2f2;
        color: #dc2626;
    }

    .form-label{
        font-weight: 700;
        color: #374151;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select{
        border-radius: 16px;
        padding: 14px 18px;
        border: 1px solid #ddd6fe;
        background: #fafaff;
    }

    .form-control:focus,
    .form-select:focus{
        border-color: #6f2cff;
        box-shadow: 0 0 0 0.2rem rgba(111,44,255,0.12);
    }

    .budget-icon{
        width: 95px;
        height: 95px;
        object-fit: contain;
        border-radius: 24px;
        background: #f3e8ff;
        padding: 18px;
    }

</style>

<div class="container py-4">

    <div class="form-card">

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>

                <h2 class="section-title mb-1">
                    Edit Budget
                </h2>

                <p class="text-muted mb-0">
                    Update your budget details and categories.
                </p>

            </div>

        </div>

        <div class="text-center mb-5">

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135706.png"
                 width="120">

            <p class="text-primary fw-bold mt-3 mb-0">
                Manage Your Budget
            </p>

        </div>

        <form action="{{ route('budget.update', $budget->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label">
                    Budget Name
                </label>

                <input type="text"
                    name="budget_name"
                    class="form-control"
                    value="{{ old('budget_name', $budget->budget_name) }}">

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Total Amount
                </label>

                <input type="number"
                    name="limit_amount"
                    class="form-control"
                    value="{{ old('limit_amount', $budget->limit_amount) }}">

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Period
                    </label>

                    <select name="period"
                            class="form-select">

                        <option value="monthly"
                            {{ $budget->period == 'monthly' ? 'selected' : '' }}>
                            Monthly
                        </option>

                        <option value="weekly"
                            {{ $budget->period == 'weekly' ? 'selected' : '' }}>
                            Weekly
                        </option>

                        <option value="yearly"
                            {{ $budget->period == 'yearly' ? 'selected' : '' }}>
                            Yearly
                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Start Date
                    </label>

                    <input type="date"
                        name="start_date"
                        class="form-control"
                        value="{{ old('start_date', \Carbon\Carbon::parse($budget->start_date)->format('Y-m-d')) }}">

                </div>

            </div>

            <div class="mb-5">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Write your budget description...">{{ old('description', $budget->description) }}</textarea>

            </div>

            <div class="d-flex justify-content-between">

                <button type="submit"
                        form="delete-form"
                        class="delete-btn">

                    Delete Budget

                </button>

                <button type="submit"
                        class="purple-btn">

                    Update Budget

                </button>

            </div>

        </form>

        <form id="delete-form"
            action="{{ route('budget.destroy', $budget->id) }}"
            method="POST">

            @csrf
            @method('DELETE')

        </form>

    </div>

</div>

@endsection