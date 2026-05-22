@extends('components.layout.sidebar')

@section('content')

<style>
    .history-card{
        border: 2px solid #a855f7;
        border-radius: 18px;
        background: white;
        padding: 18px;
    }
</style>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <h2 class="fw-bold">
            Goal History
        </h2>

        <select class="form-select" style="width:220px;">
            <option>All Transactions</option>
        </select>

    </div>

    @forelse($transactions->groupBy(function($item) {
        return \Carbon\Carbon::parse($item->created_at)->format('d F Y');
    }) as $date => $items)

        <div class="mb-4">

            <h6 class="fw-bold">
                {{ $date }}
            </h6>

            @foreach($items as $trx)

                <div class="history-card mb-2">

                    <h5 class="fw-bold {{ $trx->type == 'income' ? 'text-success' : 'text-danger' }}">
                        {{ $trx->type == 'income' ? '+' : '-' }}
                        Rp {{ number_format($trx->amount, 0, ',', '.') }}
                    </h5>

                    <small>
                        {{ $trx->note ?? 'Saving transaction' }}
                    </small>

                </div>

            @endforeach

        </div>

    @empty

        <div class="text-center text-muted">
            No transaction history yet.
        </div>

    @endforelse

    <div class="text-center mt-5">
        <button class="btn btn-outline-primary px-5">
            Load More
        </button>
    </div>

</div>

@endsection