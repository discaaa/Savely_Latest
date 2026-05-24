@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .page-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .page-subtitle{
        color: #6b7280;
    }

    .new-btn{
        position: fixed;
        bottom: 30px;
        right: 35px;
        background: #6f2cff;
        color: white;
        padding: 14px 24px;
        border-radius: 18px;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 8px 24px rgba(111,44,255,0.2);
        transition: 0.3s;
    }

    .summary-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 10px 24px rgba(111,44,255,0.08);
        height: 100%;
    }

    .budget-card{
        background: white;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid #ede9fe;
        box-shadow: 0 10px 24px rgba(111,44,255,0.08);
        transition: 0.3s;
        height: 100%;
    }

    .budget-card:hover{
        transform: translateY(-3px);
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

    .progress{
        height: 16px;
        border-radius: 999px;
        background: #ede9fe;
        overflow: hidden;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #a855f7
        );
        font-weight: 700;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .circle-progress{
        width: 220px;
        height: 220px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    }

    .circle-inner{
        width: 165px;
        height: 165px;
        border-radius: 50%;
        background: white;

        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .budget-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .small-progress{
        height: 12px;
    }

    .action-btn{
        border-radius: 999px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                My Budgets
            </h2>

            <p class="text-muted mb-0">
                Plan your spending and monitor every budget easily.
            </p>

        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="{{ route('budget.create') }}"
               class="purple-btn text-decoration-none">

                + New Budget

            </a>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="55" class="rounded-circle border p-1 bg-white">
            
        </div>

    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <div class="summary-card">

                <p class="text-muted fw-semibold mb-2">
                    Total Budget
                </p>

                <h3 class="fw-bold mb-0">
                    Rp {{ number_format($totalBudget, 0, ',', '.') }}
                </h3>

            </div>

        </div>

        <div class="col-md-3">

            <div class="summary-card">

                <p class="text-muted fw-semibold mb-2">
                    Total Spent
                </p>

                <h3 class="fw-bold mb-0">
                    Rp {{ number_format($totalSpent, 0, ',', '.') }}
                </h3>

            </div>

        </div>

        <div class="col-md-3">

            <div class="summary-card">

                <p class="text-muted fw-semibold mb-2">
                    Remaining
                </p>

                <h3 class="fw-bold mb-0">
                    Rp {{ number_format($remainingBudget, 0, ',', '.') }}
                </h3>

            </div>

        </div>

        <div class="col-md-3">

            <div class="summary-card">

                <p class="text-muted fw-semibold mb-2">
                    Budgets
                </p>

                <h3 class="fw-bold mb-0">
                    {{ $budgets->count() }}
                </h3>

            </div>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-5">

            <div class="summary-card">

                <div class="text-center mb-5">

                    <div class="circle-progress"
                         style="
                         background:
                         conic-gradient(
                            #6f2cff 0% {{ $overallPercentage }}%,
                            #ede9fe {{ $overallPercentage }}% 100%
                         );
                    ">

                        <div class="circle-inner">

                            <div>

                                <h1 class="fw-bold mb-1">
                                    {{ $overallPercentage }}%
                                </h1>

                                <small class="text-muted">
                                    Budget Used
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="d-flex flex-column gap-4">

                    @foreach($budgets->take(3) as $budget)

                    <div>

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="d-flex align-items-center gap-3">

                                <div>

                                    <h6 class="fw-bold mb-0">
                                        {{ $budget->budget_name }}
                                    </h6>

                                    <small class="text-muted">
                                        Rp {{ number_format($budget->spent, 0, ',', '.') }} spent
                                    </small>

                                </div>

                            </div>

                            <span class="budget-badge">
                                {{ $budget->percentage }}%
                            </span>

                        </div>

                        <div class="progress small-progress">

                            <div class="progress-bar"
                                 style="width:{{ $budget->percentage }}%">

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="fw-bold mb-0">
                        Budget List
                    </h3>

                    <span class="budget-badge">
                        {{ $budgets->count() }} Budgets
                    </span>

                </div>

                <div class="row">

                    @foreach($budgets as $budget)

                    <div class="col-12 mb-4">

                        <div class="budget-card">

                            <div class="d-flex justify-content-between align-items-start mb-4">

                                <div class="d-flex gap-3">

                                    <div>

                                        <h5 class="fw-bold mb-1">
                                            {{ $budget->budget_name }}
                                        </h5>

                                        <small class="text-muted">
                                            {{ ucfirst($budget->period) }}
                                        </small>

                                    </div>

                                </div>

                                <span class="budget-badge">
                                    Rp {{ number_format($budget->limit_amount, 0, ',', '.') }}
                                </span>

                            </div>

                            <div class="progress mb-4">

                                <div class="progress-bar"
                                     style="width:{{ $budget->percentage }}%">

                                </div>

                            </div>

                            <div class="d-flex flex-wrap gap-2">

                                <a href="{{ route('budget.edit', $budget->id) }}"
                                   class="btn text-white action-btn"
                                   style="background:#6f2cff;">

                                    Edit

                                </a>

                                <a href="{{ route('budget.detail', $budget->id) }}"
                                   class="btn text-white action-btn"
                                   style="background:#6f2cff;">

                                    Detail

                                </a>

                                <a href="{{ route('budget.history', $budget->id) }}"
                                   class="btn text-white action-btn"
                                   style="background:#6f2cff;">

                                    History

                                </a>                                

                                <form action="{{ route('budget.destroy', $budget->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger action-btn">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>
    <a href="{{ route('expense.create') }}"
       class="new-btn">

        + Add Spending

    </a>
</div>

@endsection