@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">Expense</h2>
            <p class="text-muted mb-0">Manage and track your expenses</p>

        </div>

        <a href="{{ route('expense.create') }}">

            <x-ui.button.primary>
                Add Expense
            </x-ui.button.primary>

        </a>

    </div>

    {{-- SUMMARY --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">Total Expense</p>

                <h3 class="fw-bold">
                    Rp {{ number_format($expenses->sum('amount'), 0, ',', '.') }}
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">Total Transactions</p>

                <h3 class="fw-bold">
                    {{ $expenses->count() }}
                </h3>

            </x-ui.card.default>

        </div>

        <div class="col-md-4">

            <x-ui.card.default>

                <p class="text-muted mb-2">Highest Category</p>
                <h3 class="fw-bold">
                    {{ $highestCategory->category ?? '-' }}
                </h3>

            </x-ui.card.default>

        </div>

    </div>

    {{-- EXPENSE TABLE --}}
    <x-ui.card.default>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Purpose</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>
                    @forelse($expenses as $expense)                    

                    <tr>

                        <td>
                            <x-ui.badge.expense>
                                {{ $expense->category }}
                            </x-ui.badge.expense>
                        </td>

                        <td>
                            Rp {{ number_format($expense->amount, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}
                        </td>

                        <td>
                            {{ $expense->description ?? '-' }}
                        </td>

                        <td>
                            {{ $expense->description ?? '-' }}
                        </td>                            

                            <div class="d-flex gap-2">

                                <a href="{{ route('expense.edit', $expense->id) }}">

                                    <x-ui.button.primary>
                                        Edit
                                    </x-ui.button.primary>

                                </a>

                                <form action="{{ route('expense.delete', $expense->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')                    

                                    <button class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>
                            </div>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No expense data yet                    
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </x-ui.card.default>

</div>

@endsection