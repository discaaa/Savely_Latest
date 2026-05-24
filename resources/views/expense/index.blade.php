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

    .summary-card{
        background: white;
        border-radius: 24px;
        padding: 28px;
        box-shadow: 0 8px 25px rgba(111,44,255,0.08);
        transition: 0.3s;
        border: 1px solid #ede9fe;
    }

    .summary-card:hover{
        transform: translateY(-4px);
    }

    .summary-title{
        color: #6b7280;
        font-size: 15px;
    }

    .summary-value{
        font-size: 28px;
        font-weight: 800;
        color: #111827;
    }

    .expense-card{
        background: white;
        border-radius: 28px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
    }

    .table th{
        border: none;
        color: #6b7280;
        font-size: 14px;
        font-weight: 700;
        padding-bottom: 18px;
    }

    .table td{
        vertical-align: middle;
        border-top: 1px solid #f1f1f1;
        padding: 18px 10px;
    }

    .expense-row{
        transition: 0.2s;
    }

    .expense-row:hover{
        background: #faf5ff;
    }

    .expense-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 10px 16px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 14px;
    }

    .amount-text{
        font-weight: 800;
        color: #dc2626;
    }

    .action-btn{
        width: 40px;
        height: 40px;
        border-radius: 12px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
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

    .edit-btn{
        background: #ede9fe;
        color: #6f2cff;
    }

    .edit-btn:hover{
        background: #d8b4fe;
    }

    .delete-btn{
        background: #fee2e2;
        color: #dc2626;
    }

    .delete-btn:hover{
        background: #fecaca;
    }

    .empty-img{
        width: 180px;
    }

</style>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="section-title mb-1">
                Expense Tracker
            </h2>

            <p class="text-muted mb-0">
                Manage and monitor your daily expenses
            </p>

        </div>
        
            <div class="d-flex align-items-center gap-3">

            <a href="{{ route('expense.create') }}"
            class="purple-btn text-decoration-none">

                + Add Expense

            </a>
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="55" class="rounded-circle border p-1 bg-white">

        </div>
    </div>

    {{-- SUMMARY --}}
    <div class="row g-4 mb-4">

        {{-- Total Expense --}}
        <div class="col-lg-4">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Total Expense
                        </p>

                        <h3 class="summary-value">

                            Rp {{ number_format($expenses->sum('amount'),0,',','.') }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

        {{-- Transactions --}}
        <div class="col-lg-4">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Transactions
                        </p>

                        <h3 class="summary-value">

                            {{ $expenses->count() }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

        {{-- Highest --}}
        <div class="col-lg-4">

            <div class="summary-card">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="summary-title mb-2">
                            Highest Category
                        </p>

                        <h3 class="summary-value">

                            {{ $highestCategory->category ?? '-' }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="expense-card">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Purpose</th>
                        <th class="text-center">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($expenses as $expense)

                    <tr class="expense-row">

                        <td>

                            <span class="expense-badge">

                                {{ $expense->category }}

                            </span>

                        </td>

                        <td class="amount-text">

                            Rp {{ number_format($expense->amount,0,',','.') }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}

                        </td>

                        <td>

                            {{ $expense->description ?? '-' }}

                        </td>

                        <td>

                            {{ $expense->purpose ?? '-' }}

                        </td>

                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('expense.edit', $expense->id) }}"
                                   class="action-btn edit-btn text-decoration-none">

                                    ✏️

                                </a>

                                <form action="{{ route('expense.delete', $expense->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="action-btn delete-btn">

                                        🗑️

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-5">

                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                                 class="empty-img mb-4">

                            <h5 class="fw-bold">
                                No Expense Yet
                            </h5>

                            <p class="text-muted">
                                Start tracking your spending now.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection