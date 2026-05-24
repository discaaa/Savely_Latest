@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .history-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        transition: 0.3s;
    }

    .history-card:hover{
        transform: translateY(-3px);
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .filter-select{
        border-radius: 14px;
        border: 1px solid #ddd6fe;
        padding: 10px 16px;
        font-weight: 600;
        box-shadow: none;
    }

    .amount-expense{
        color: #ef4444;
        font-weight: 800;
    }

    .category-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .date-title{
        color: #6b7280;
        font-weight: 700;
    }

    .empty-img{
        width: 170px;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                {{ $budget->budget_name }} History
            </h2>

            <p class="text-muted mb-0">
                Track all your budget transactions and expenses.
            </p>

        </div>

        <select class="form-select filter-select"
                style="width:220px;">

            <option>
                {{ ucfirst($budget->period) }}
            </option>

        </select>

    </div>

    @forelse($transactions->groupBy(function($item){
        return \Carbon\Carbon::parse($item->created_at)->format('d F Y');
    }) as $date => $items)

        <div class="mb-5">

            <h5 class="date-title mb-4">

                {{ $date }}

            </h5>

            <div class="row g-4">

                @foreach($items as $trx)

                    <div class="col-lg-6">

                        <div class="history-card">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>

                                    <h4 class="amount-expense mb-2">

                                        - Rp {{ number_format($trx->amount,0,',','.') }}

                                    </h4>

                                    <h6 class="fw-bold mb-1">

                                        {{ $trx->note ?? 'Expense Transaction' }}

                                    </h6>

                                    <small class="text-muted">

                                        {{ \Carbon\Carbon::parse($trx->created_at)->format('H:i') }}

                                    </small>

                                </div>

                                <span class="category-badge">

                                    {{ $budget->budget_name }}

                                </span>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @empty

        <div class="history-card text-center py-5">

            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                 class="empty-img mb-4">

            <h4 class="fw-bold">
                No Budget History Yet
            </h4>

            <p class="text-muted mb-0">
                Your expense transactions will appear here.
            </p>

        </div>

    @endforelse

</div>

@endsection