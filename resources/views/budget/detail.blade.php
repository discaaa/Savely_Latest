@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .detail-card{
        background: white;
        border-radius: 28px;
        padding: 30px;
        border: 1px solid #ede9fe;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
    }

    .summary-box{
        background: #faf7ff;
        border-radius: 22px;
        padding: 24px;
        border: 1px solid #ede9fe;
        text-align: center;
        height: 100%;
    }

    .summary-title{
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .summary-value{
        font-size: 28px;
        font-weight: 800;
        color: #111827;
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

    .progress{
        height: 16px;
        border-radius: 999px;
        overflow: hidden;
        background: #ede9fe;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #a855f7
        );
        font-weight: 700;
    }

    .category-card{
        background: #faf7ff;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid #ede9fe;
        margin-bottom: 20px;
    }

    .category-icon{
        width: 52px;
        height: 52px;
        border-radius: 18px;
        background: #f3e8ff;

        display: flex;
        justify-content: center;
        align-items: center;

        font-size: 22px;
    }

    .category-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                {{ $budget->budget_name }}
            </h2>

            <p class="text-muted mb-0">
                {{ ucfirst($budget->period) }} Budget
            </p>

        </div>

        <a href="{{ route('budget.edit', $budget->id) }}"
           class="purple-btn">

            Edit Budget

        </a>

    </div>

    <div class="detail-card">

        <div class="row g-4 mb-5">

            <div class="col-md-4">

                <div class="summary-box">

                    <p class="summary-title">
                        Total Budget
                    </p>

                    <h3 class="summary-value">
                        Rp {{ number_format($budget->limit_amount, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

            <div class="col-md-4">

                <div class="summary-box">

                    <p class="summary-title">
                        Total Spent
                    </p>

                    <h3 class="summary-value">
                        Rp {{ number_format($budget->spent ?? 0, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

            <div class="col-md-4">

                <div class="summary-box">

                    <p class="summary-title">
                        Remaining
                    </p>

                    <h3 class="summary-value">
                        Rp {{ number_format($budget->remaining ?? $budget->limit_amount, 0, ',', '.') }}
                    </h3>

                </div>

            </div>

        </div>

        <div class="mb-5">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="fw-bold mb-0">
                    Budget Usage
                </h5>

                <span class="category-badge">
                    {{ $budget->percentage ?? 0 }}% Used
                </span>

            </div>

            <div class="progress"
                 style="height:20px;">

                <div class="progress-bar"
                     style="width:{{ $budget->percentage ?? 0 }}%">

                    {{ $budget->percentage ?? 0 }}%

                </div>

            </div>

        </div>

        <div>

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold mb-0">
                    Budget Information
                </h4>

                <span class="category-badge">
                    {{ ucfirst($budget->period) }}
                </span>

            </div>

            <div class="category-card">

                <div class="d-flex justify-content-between align-items-start mb-4">

                    <div class="d-flex gap-3">

                        <div class="category-icon">
                            💰
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                {{ $budget->budget_name }}
                            </h5>

                            <small class="text-muted">
                                Started at {{ \Carbon\Carbon::parse($budget->start_date)->format('d F Y') }}
                            </small>

                        </div>

                    </div>

                    <span class="category-badge">
                        Active
                    </span>

                </div>

                <div class="progress mb-3"
                     style="height:14px;">

                    <div class="progress-bar"
                         style="width:{{ $budget->percentage ?? 0 }}%">

                    </div>

                </div>

                <div class="d-flex justify-content-between">

                    <small class="text-muted">
                        Remaining :
                        Rp {{ number_format($budget->remaining ?? $budget->limit_amount, 0, ',', '.') }}
                    </small>

                    <small class="fw-bold text-primary">
                        {{ $budget->percentage >= 100 ? 'Limit Reached' : 'On Track' }}
                    </small>

                </div>

            </div>

            <div class="category-card">

                <h5 class="fw-bold mb-3">
                    Description
                </h5>

                <p class="text-muted mb-0">
                    {{ $budget->description ?? 'No description available.' }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection