@extends('components.layout.sidebar')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            History
        </h2>

        <p class="text-muted mb-0">
            View all your recent activities
        </p>

    </div>

    {{-- FILTER --}}
    <x-ui.card.default class="mb-4">

        <div class="row g-3">

            {{-- SEARCH --}}
            <div class="col-md-4">

                <input
                    type="text"
                    id="searchInput"
                    class="form-control"
                    placeholder="Search activity..."
                >

            </div>

            {{-- CATEGORY FILTER --}}
            <div class="col-md-4">

                <select
                    id="categoryFilter"
                    class="form-select"
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

            {{-- DATE --}}
            <div class="col-md-4">

                <input
                    type="date"
                    id="dateFilter"
                    class="form-control"
                >

            </div>

        </div>

    </x-ui.card.default>

    {{-- HISTORY TABLE --}}
    <x-ui.card.default>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody id="historyTableBody">

                    {{-- ========================= --}}
                    {{-- EXPENSE HISTORY --}}
                    {{-- ========================= --}}

                    @forelse($expenses as $expense)

                    <tr
                        class="history-row"
                        data-category="expense"
                        data-date="{{ \Carbon\Carbon::parse($expense->date)->format('Y-m-d') }}"
                    >

                        <td>
                            Added {{ $expense->category }} Expense
                        </td>

                        <td>

                            <x-ui.badge.expense>
                                Expense
                            </x-ui.badge.expense>

                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}
                        </td>

                        <td>

                            <span class="text-success fw-semibold">
                                Completed
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-3">

                            No expense history found

                        </td>

                    </tr>

                    @endforelse


                    {{-- ========================= --}}
                    {{-- GOAL HISTORY --}}
                    {{-- ========================= --}}

                    @forelse($goals as $goal)

                    <tr
                        class="history-row"
                        data-category="goal"
                        data-date="{{ $goal->created_at->format('Y-m-d') }}"
                    >

                        <td>
                            Goal "{{ $goal->title }}" Updated
                        </td>

                        <td>

                            <x-ui.badge.income>
                                Goal
                            </x-ui.badge.income>

                        </td>

                        <td>
                            {{ $goal->created_at->format('d M Y') }}
                        </td>

                        <td>

                            <span class="text-primary fw-semibold">
                                Updated
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-3">

                            No goal history found

                        </td>

                    </tr>

                    @endforelse


                    {{-- ========================= --}}
                    {{-- CHALLENGE HISTORY --}}
                    {{-- ========================= --}}

                    @forelse($challenges as $challenge)

                    <tr
                        class="history-row"
                        data-category="challenge"
                        data-date="{{ $challenge->created_at->format('Y-m-d') }}"
                    >

                        <td>
                            {{ $challenge->title }}
                        </td>

                        <td>

                            <x-ui.badge.saving>
                                Challenge
                            </x-ui.badge.saving>

                        </td>

                        <td>
                            {{ $challenge->created_at->format('d M Y') }}
                        </td>

                        <td>

                            <span class="text-warning fw-semibold">
                                {{ ucfirst($challenge->status) }}
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center text-muted py-3">

                            No challenge history found

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-ui.card.default>

</div>

{{-- FILTER SCRIPT --}}
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

            if(categoryMatch && searchMatch && dateMatch) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }

    categoryFilter.addEventListener('change', filterHistory);

    searchInput.addEventListener('keyup', filterHistory);

    dateFilter.addEventListener('change', filterHistory);

</script>

@endsection