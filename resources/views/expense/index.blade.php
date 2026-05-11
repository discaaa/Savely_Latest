@extends('layouts.app')

@section('content')

<style>

.page-header{
    background:white;

    padding:30px;

    border-radius:28px;

    margin-bottom:28px;

    box-shadow:0 4px 16px rgba(0,0,0,0.05);
}

.page-header h1{
    font-size:42px;
    margin-bottom:10px;
}

.page-header p{
    color:#777;
}

/* SUMMARY */
.summary-grid{
    display:grid;

    grid-template-columns:
        repeat(auto-fit,minmax(240px,1fr));

    gap:20px;

    margin-bottom:28px;
}

.summary-card{
    background:white;

    border-radius:24px;

    padding:24px;

    box-shadow:0 4px 14px rgba(0,0,0,0.05);

    transition:0.25s;
}

.summary-card:hover{
    transform:translateY(-4px);
}

.summary-card h3{
    color:#777;
    margin-bottom:14px;
}

.summary-card h2{
    color:#8b5cf6;
    font-size:32px;
}

/* MAIN GRID */
.main-grid{
    display:grid;

    grid-template-columns:2fr 1fr;

    gap:24px;
}

/* CARD */
.card{
    background:white;

    border-radius:28px;

    padding:28px;

    box-shadow:0 4px 16px rgba(0,0,0,0.05);
}

.card-title{
    font-size:28px;
    font-weight:700;

    margin-bottom:24px;
}

/* TABLE */
.expense-table{
    width:100%;
    border-collapse:collapse;
}

.expense-table thead{
    background:linear-gradient(
        135deg,
        #b266ff,
        #8b5cf6
    );

    color:white;
}

.expense-table thead th{
    padding:18px;
    text-align:left;
}

.expense-table tbody tr{
    border-bottom:1px solid #eee;

    transition:0.2s;
}

.expense-table tbody tr:hover{
    background:#faf7ff;
}

.expense-table tbody td{
    padding:18px;
}

.badge{
    background:#ede9fe;

    color:#8b5cf6;

    padding:8px 14px;

    border-radius:999px;

    font-size:13px;

    font-weight:700;
}

/* CHALLENGE */
.challenge-list{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.challenge-item{
    background:linear-gradient(
        135deg,
        #f5ecff,
        #f3e8ff
    );

    border-radius:22px;

    padding:22px;

    transition:0.25s;
}

.challenge-item:hover{
    transform:translateY(-4px);
}

.challenge-item h3{
    margin-bottom:10px;
}

.challenge-item p{
    color:#666;

    line-height:1.6;

    margin-bottom:18px;
}

.challenge-footer{
    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:12px;
}

.reward-points{
    background:#8b5cf6;

    color:white;

    padding:10px 18px;

    border-radius:14px;

    font-weight:bold;
}

.challenge-status{
    background:white;

    color:#8b5cf6;

    padding:10px 18px;

    border-radius:14px;

    font-weight:bold;
}

/* REWARD */
.reward-grid{
    display:grid;

    grid-template-columns:
        repeat(auto-fit,minmax(180px,1fr));

    gap:18px;
}

.reward-item{
    background:linear-gradient(
        135deg,
        #faf5ff,
        #f3e8ff
    );

    border-radius:22px;

    padding:22px;

    text-align:center;

    transition:0.25s;
}

.reward-item:hover{
    transform:translateY(-4px);
}

.reward-image{
    width:80px;
    height:80px;

    margin:auto;

    border-radius:20px;

    background:linear-gradient(
        135deg,
        #c084fc,
        #8b5cf6
    );

    margin-bottom:18px;
}

.reward-price{
    background:#8b5cf6;

    color:white;

    padding:10px;

    border-radius:14px;

    margin-top:14px;

    font-weight:bold;
}

/* RESPONSIVE */
@media(max-width:1000px){

    .main-grid{
        grid-template-columns:1fr;
    }

}

@media(max-width:768px){

    .expense-table{
        display:block;
        overflow-x:auto;
    }

}

</style>

<!-- HEADER -->
<div class="page-header">

    <h1>
        Expense & Rewards
    </h1>

    <p>
        Track your expenses and complete challenges to earn rewards
    </p>

</div>

<!-- SUMMARY -->
<div class="summary-grid">

    <div class="summary-card">

        <h3>
            Monthly Expense
        </h3>

        <h2>
            Rp 2.500.000
        </h2>

    </div>

    <div class="summary-card">

        <h3>
            Highest Category
        </h3>

        <h2>
            Food
        </h2>

    </div>

    <div class="summary-card">

        <h3>
            Reward Points
        </h3>

        <h2>
            3.250 pts
        </h2>

    </div>

</div>

<!-- MAIN -->
<div class="main-grid">

    <!-- LEFT -->
    <div>

        <!-- EXPENSE -->
        <div class="card">

            <div class="card-title">
                Expense History
            </div>

            <table class="expense-table">

                <thead>

                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Notes</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>
                            <span class="badge">
                                Food
                            </span>
                        </td>

                        <td>
                            Rp 50.000
                        </td>

                        <td>
                            10 May 2026
                        </td>

                        <td>
                            Lunch with friends
                        </td>

                    </tr>

                    <tr>

                        <td>
                            <span class="badge">
                                Transport
                            </span>
                        </td>

                        <td>
                            Rp 20.000
                        </td>

                        <td>
                            11 May 2026
                        </td>

                        <td>
                            GoRide
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <!-- REWARD -->
        <div class="card" style="margin-top:24px;">

            <div class="card-title">
                Reward Store
            </div>

            <div class="reward-grid">

                @foreach($rewards as $reward)

                <div class="reward-item">

                    <div class="reward-image"></div>

                    <h3>
                        {{ $reward->name }}
                    </h3>

                    <div class="reward-price">

                        {{ $reward->price_points }} pts

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div>

        <div class="card">

            <div class="card-title">
                Active Challenges
            </div>

            <div class="challenge-list">

                @foreach($challenges as $challenge)

                <div class="challenge-item">

                    <h3>
                        {{ $challenge->title }}
                    </h3>

                    <p>
                        {{ $challenge->description }}
                    </p>

                    <div class="challenge-footer">

                        <div class="reward-points">
                            +{{ $challenge->reward_points }} pts
                        </div>

                        <div class="challenge-status">
                            {{ $challenge->status }}
                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection