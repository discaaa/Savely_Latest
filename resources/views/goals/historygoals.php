@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background-color: #f7f7f7;
    }

    .history-card{
        border: 2px solid #a855f7;
        border-radius: 18px;
        background: white;
        padding: 18px;
        transition: 0.3s;
    }

    .history-card:hover{
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .badge-income{
        background: #d1fae5;
        color: #065f46;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .badge-outcome{
        background: #fee2e2;
        color: #991b1b;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

</style>

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="fw-bold mb-1">
                Goal History
            </h2>

            <p class="text-secondary mb-0">
                Track all saving transactions from your goals.
            </p>

        </div>

        {{-- Filter --}}
        <form method="GET">

            <select name="goal"
                    class="form-select"
                    style="width:220px;"
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

    {{-- Transaction List --}}
    @forelse($transactions as $transaction)

        <div class="mb-4">

            {{-- Date --}}
            <h6 class="fw-bold mb-3">

                {{ \Carbon\Carbon::parse(
                    $transaction->saving_date
                )->format('d F Y') }}

            </h6>

            {{-- Card --}}
            <div class="history-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        {{-- Amount --}}
                        <h5 class="fw-bold text-success mb-2">

                            + Rp {{ number_format(
                                $transaction->amount,
                                0,
                                ',',
                                '.'
                            ) }}

                        </h5>

                        {{-- Goal --}}
                        <small class="text-secondary d-block">

                            Goal :
                            {{ $transaction->goal->title ?? '-' }}

                        </small>

                        {{-- Method --}}
                        <small class="text-secondary d-block">

                            Method :
                            {{ $transaction->method }}

                        </small>

                        {{-- Note --}}
                        @if($transaction->note)

                            <small class="text-secondary d-block mt-1">

                                Note :
                                {{ $transaction->note }}

                            </small>

                        @endif

                    </div>

                    {{-- Status Badge --}}
                    <div>

                        <span class="badge-income">
                            Saving
                        </span>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <x-ui.card.default>

            <div class="text-center py-5">

                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
                     width="120"
                     class="mb-3">

                <h4 class="fw-bold">
                    No Transactions Yet
                </h4>

                <p class="text-secondary">
                    Start saving money to see your history here.
                </p>

            </div>

        </x-ui.card.default>

    @endforelse

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-5">

        {{ $transactions->links() }}

    </div>

</div>

@endsection