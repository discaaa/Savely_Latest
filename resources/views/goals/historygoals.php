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

    .filter-select{
        border-radius: 14px;
        border: 1px solid #ddd6fe;
        padding: 12px;
        box-shadow: none;
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
        transform: translateY(-4px);
    }

    .amount-text{
        color: #16a34a;
        font-weight: 800;
        font-size: 24px;
    }

    .goal-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .saving-badge{
        background: #dcfce7;
        color: #15803d;
        padding: 10px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: bold;
    }

    .transaction-date{
        font-size: 14px;
        color: #6b7280;
        font-weight: 600;
    }

    .empty-img{
        width: 180px;
    }

    .pagination .page-link{
        border-radius: 12px !important;
        margin: 0 4px;
        border: none;
        color: #6f2cff;
    }

    .pagination .active .page-link{
        background: #6f2cff;
        color: white;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="page-title">
                Goal Saving History
            </h2>

            <p class="page-subtitle mb-0">
                Track all saving transactions from your goals
            </p>

        </div>

        <form method="GET">

            <select name="goal"
                    class="form-select filter-select"
                    style="width:240px;"
                    onchange="this.form.submit()">

                <option value="">
                    All Transactions
                </option>

                @foreach($goals as $goal)

                    <option value="{{ $goal->id }}"
                        {{ request('goal') == $goal->id ? 'selected' : '' }}>

                        {{ $goal->title }}

                    </option>

                @endforeach

            </select>

        </form>

    </div>

    <div class="row g-4">

        @forelse($transactions as $transaction)

            <div class="col-lg-6">

                <div class="history-card h-100">

                    <div class="d-flex justify-content-between align-items-start mb-4">

                        <div>

                            <div class="transaction-date mb-2">

                                {{ \Carbon\Carbon::parse(
                                    $transaction->saving_date
                                )->format('d F Y') }}

                            </div>

                            <h3 class="amount-text">

                                + Rp {{ number_format(
                                    $transaction->amount,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </h3>

                        </div>

                        <span class="saving-badge">

                            Saving

                        </span>

                    </div>

                    <div class="mb-3">

                        <span class="goal-badge">

                            {{ $transaction->goal->title ?? '-' }}

                        </span>

                    </div>

                    <div class="text-secondary">

                        <div class="mb-2">

                            <strong>Method :</strong>
                            {{ $transaction->method }}

                        </div>

                        @if($transaction->note)

                            <div>

                                <strong>Note :</strong>
                                {{ $transaction->note }}

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="history-card text-center py-5">

                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
                         class="empty-img mb-4">

                    <h4 class="fw-bold">
                        No Transactions Yet
                    </h4>

                    <p class="text-muted">

                        Start saving money to see your history here.

                    </p>

                </div>

            </div>

        @endforelse

    </div>

    <div class="d-flex justify-content-center mt-5">

        {{ $transactions->links() }}

    </div>

</div>

@endsection