@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .history-card{
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
    }

    .filter-box{
        background: white;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .table th{
        color: #6b7280;
        font-weight: 700;
        border-bottom: 1px solid #ede9fe;
        padding-bottom: 16px;
    }

    .table td{
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        padding-top: 18px;
        padding-bottom: 18px;
    }

    .status-badge{
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        display: inline-block;
    }

    .expense-badge{
        background: #fee2e2;
        color: #dc2626;
    }

    .goal-badge{
        background: #ede9fe;
        color: #6f2cff;
    }

    .challenge-badge{
        background: #dcfce7;
        color: #16a34a;
    }

    .completed-text{
        color: #16a34a;
        font-weight: 700;
    }

    .updated-text{
        color: #6f2cff;
        font-weight: 700;
    }

    .active-text{
        color: #f59e0b;
        font-weight: 700;
    }

    .filter-input{
        border-radius: 14px;
        border: 1px solid #ddd6fe;
        padding: 12px 16px;
        box-shadow: none;
    }

</style>

<div class="container-fluid py-4">

    <div class="mb-5">

        <h2 class="section-title mb-1">
            History
        </h2>

        <p class="text-muted mb-0">
            View all your recent financial activities.
        </p>

    </div>

    <div class="filter-box mb-4">

        <div class="row g-3">

            <div class="col-md-4">

                <input
                    type="text"
                    id="searchInput"
                    class="form-control filter-input"
                    placeholder="Search activity..."
                >

            </div>

            <div class="col-md-4">

                <select
                    id="categoryFilter"
                    class="form-select filter-input"
                >

                    <option value="all">
                        All Activities
                    </option>

                    <option value="expense">
                        Expense
                    </option>

                    <option value="goal">
                        Goal
                    </option>

                    <option value="challenge">
                        Challenge
                    </option>

                </select>

            </div>

            <div class="col-md-4">

                <input
                    type="date"
                    id="dateFilter"
                    class="form-control filter-input"
                >

            </div>

        </div>

    </div>

    <div class="history-card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h4 class="fw-bold mb-1">
                    Recent Activities
                </h4>

                <p class="text-muted mb-0">
                    Your latest transactions and updates.
                </p>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>
                            Activity
                        </th>

                        <th>
                            Category
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody id="historyTableBody">

                    @forelse($expenses as $expense)

                        <tr
                            class="history-row"
                            data-category="expense"
                            data-date="{{ \Carbon\Carbon::parse($expense->date)->format('Y-m-d') }}"
                        >

                            <td class="fw-semibold">

                                Added {{ $expense->category }} Expense

                            </td>

                            <td>

                                <span class="status-badge expense-badge">

                                    Expense

                                </span>

                            </td>

                            <td class="text-muted">

                                {{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}

                            </td>

                            <td>

                                <span class="completed-text">

                                    Completed

                                </span>

                            </td>

                        </tr>

                    @empty

                    @endforelse

                    @forelse($goals as $goal)

                        <tr
                            class="history-row"
                            data-category="goal"
                            data-date="{{ $goal->created_at->format('Y-m-d') }}"
                        >

                            <td class="fw-semibold">

                                Goal "{{ $goal->title }}" Updated

                            </td>

                            <td>

                                <span class="status-badge goal-badge">

                                    Goal

                                </span>

                            </td>

                            <td class="text-muted">

                                {{ $goal->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <span class="updated-text">

                                    Updated

                                </span>

                            </td>

                        </tr>

                    @empty

                    @endforelse

                    @forelse($challenges as $challenge)

                        <tr
                            class="history-row"
                            data-category="challenge"
                            data-date="{{ $challenge->created_at->format('Y-m-d') }}"
                        >

                            <td class="fw-semibold">

                                {{ $challenge->title }}

                            </td>

                            <td>

                                <span class="status-badge challenge-badge">

                                    Challenge

                                </span>

                            </td>

                            <td class="text-muted">

                                {{ $challenge->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <span class="active-text">

                                    {{ ucfirst($challenge->status) }}

                                </span>

                            </td>

                        </tr>

                    @empty

                    @endforelse

                </tbody>

            </table>

            @if(
                $expenses->count() == 0 &&
                $goals->count() == 0 &&
                $challenges->count() == 0
            )

                <div class="text-center py-5 text-muted">

                    No history found.

                </div>

            @endif

        </div>

    </div>

</div>

<script>

    const categoryFilter = document.getElementById('categoryFilter');
    const searchInput = document.getElementById('searchInput');
    const dateFilter = document.getElementById('dateFilter');

    const rows = document.querySelectorAll('.history-row');

    function filterHistory() {

        const selectedCategory = categoryFilter.value.toLowerCase();
        const searchText = searchInput.value.toLowerCase();
        const selectedDate = dateFilter.value;

        rows.forEach(row => {

            const category = row.dataset.category;
            const rowDate = row.dataset.date;
            const text = row.innerText.toLowerCase();

            let categoryMatch =
                selectedCategory === 'all' ||
                category === selectedCategory;

            let searchMatch =
                text.includes(searchText);

            let dateMatch =
                !selectedDate ||
                rowDate === selectedDate;

            if(categoryMatch && searchMatch && dateMatch){

                row.style.display = '';

            }else{

                row.style.display = 'none';

            }

        });

    }

    categoryFilter.addEventListener('change', filterHistory);

    searchInput.addEventListener('keyup', filterHistory);

    dateFilter.addEventListener('change', filterHistory);

</script>

@endsection