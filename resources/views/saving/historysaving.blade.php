@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .section-subtitle{
        color: #6b7280;
        font-size: 15px;
    }

    .history-card{
        background: white;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        transition: 0.3s;
    }

    .history-card:hover{
        transform: translateY(-3px);
    }

    .income-text{
        color: #16a34a;
        font-weight: 800;
    }

    .expense-text{
        color: #dc2626;
        font-weight: 800;
    }

    .filter-select{
        width: 230px;
        border-radius: 16px;
        padding: 12px 16px;
        border: 1px solid #ddd6fe;
        background: white;
    }

    .date-title{
        font-size: 16px;
        font-weight: 700;
        color: #5b21b6;
        margin-bottom: 18px;
    }

    .history-note{
        color: #6b7280;
        font-size: 14px;
    }

    .badge-saving{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .load-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        border-radius: 16px;
        padding: 12px 35px;
        font-weight: 700;
        background: white;
        transition: 0.3s;
    }

    .load-btn:hover{
        background: #f3e8ff;
    }

    .empty-card{
        background: white;
        border-radius: 28px;
        padding: 50px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
    }

    .empty-img{
        width: 140px;
    }

</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                Goal History
            </h2>

            <p class="section-subtitle mb-0">
                Track all your saving transactions
            </p>

        </div>

        <select class="form-select filter-select">

            <option>
                All Transactions
            </option>

        </select>

    </div>

    @forelse($transactions->groupBy(function($item) {

        return \Carbon\Carbon::parse(
            $item->created_at
        )->format('d F Y');

    }) as $date => $items)

        <div class="mb-5">

            <h6 class="date-title">

                {{ $date }}

            </h6>

            @foreach($items as $trx)

                <div class="history-card mb-3">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h4 class="
                                {{ $trx->type == 'income'
                                    ? 'income-text'
                                    : 'expense-text'
                                }}
                                mb-2
                            ">

                                {{ $trx->type == 'income' ? '+' : '-' }}

                                Rp {{ number_format(
                                    $trx->amount,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </h4>

                            <p class="history-note mb-1">

                                {{ $trx->note ?? 'Saving transaction' }}

                            </p>

                        </div>

                        <span class="badge-saving">

                            {{ ucfirst($trx->type) }}

                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @empty

        <div class="empty-card">

            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
                 class="empty-img mb-4">

            <h4 class="fw-bold mb-2">
                No Transaction History
            </h4>

            <p class="text-muted mb-0">
                Your saving activity will appear here.
            </p>

        </div>

    @endforelse

    @if($transactions->count() > 0)

        <div class="text-center mt-5">

            <button class="load-btn">

                Load More

            </button>

        </div>

    @endif

</div>

@endsection