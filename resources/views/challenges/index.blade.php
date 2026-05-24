@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .summary-card{
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        height: 100%;
    }

    .challenge-card{
        background: white;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
        transition: 0.3s;
        height: 100%;
    }

    .challenge-card:hover{
        transform: translateY(-3px);
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .summary-title{
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .summary-value{
        font-size: 34px;
        font-weight: 800;
        color: #111827;
    }

    .challenge-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .completed-badge{
        background: #dcfce7;
        color: #166534;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .progress{
        border-radius: 999px;
        background: #ede9fe;
        overflow: hidden;
        height: 18px;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #a855f7
        );
        font-weight: 700;
    }

    .reward-box{
        background: #f3e8ff;
        border-radius: 18px;
        padding: 12px 18px;
        font-weight: 700;
        color: #6f2cff;
        display: inline-block;
    }

    .table-card{
        background: white;
        border-radius: 24px;
        padding: 28px;
        border: 1px solid #ede9fe;
        box-shadow: 0 8px 24px rgba(111,44,255,0.08);
    }

    .table th{
        color: #6b7280;
        font-weight: 700;
        border-bottom: 1px solid #ede9fe;
    }

    .table td{
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        padding-top: 18px;
        padding-bottom: 18px;
    }

</style>

<div class="container-fluid py-4">

    <div class="mb-5">

        <h2 class="section-title mb-1">
            Challenges
        </h2>

        <p class="text-muted mb-0">
            Complete challenges and earn rewards.
        </p>

    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-4">

            <div class="summary-card">

                <p class="summary-title">
                    Active Challenges
                </p>

                <h2 class="summary-value">

                    {{ $challenges->where('status', 'active')->count() }}

                </h2>

            </div>

        </div>

        <div class="col-md-4">

            <div class="summary-card">

                <p class="summary-title">
                    Current Streak
                </p>

                <h2 class="summary-value">

                    7 Days 🔥

                </h2>

            </div>

        </div>

        <div class="col-md-4">

            <div class="summary-card">

                <p class="summary-title">
                    Reward Points
                </p>

                <h2 class="summary-value">

                    {{ $challenges->sum('reward_points') }}

                </h2>

            </div>

        </div>

    </div>

    <div class="row g-4 mb-5">

        @forelse($challenges->where('status', 'active') as $challenge)

            <div class="col-lg-6">

                <div class="challenge-card">

                    <div class="d-flex justify-content-between align-items-start mb-4">

                        <div>

                            <h4 class="fw-bold mb-2">

                                {{ $challenge->title }}

                            </h4>

                            <p class="text-muted mb-0">

                                {{ $challenge->description }}

                            </p>

                        </div>

                        <span class="challenge-badge">

                            Active

                        </span>

                    </div>

                    <div class="reward-box mb-4">

                        + {{ $challenge->reward_points }} Points

                    </div>

                    <div class="d-flex justify-content-between mb-2">

                        <small class="fw-semibold text-muted">

                            Challenge Progress

                        </small>

                        <small class="fw-bold text-primary">

                            70%

                        </small>

                    </div>

                    <div class="progress mb-3">

                        <div class="progress-bar"
                             style="width:70%">

                            70%

                        </div>

                    </div>

                    <small class="text-muted">

                        Challenge in progress

                    </small>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="challenge-card text-center py-5">

                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                         width="170"
                         class="mb-4">

                    <h4 class="fw-bold">
                        No Active Challenges
                    </h4>

                    <p class="text-muted mb-0">
                        Start a new challenge to earn rewards.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

    <div class="table-card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h4 class="fw-bold mb-1">
                    Completed Challenges
                </h4>

                <p class="text-muted mb-0">
                    Last 30 days activity
                </p>

            </div>

            <span class="challenge-badge">

                {{ $challenges->where('status', 'completed')->count() }}
                Completed

            </span>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>
                            Challenge
                        </th>

                        <th>
                            Reward
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($challenges->where('status', 'completed') as $challenge)

                        <tr>

                            <td class="fw-semibold">

                                {{ $challenge->title }}

                            </td>

                            <td class="text-primary fw-bold">

                                +{{ $challenge->reward_points }} Points

                            </td>

                            <td class="text-muted">

                                {{ $challenge->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <span class="completed-badge">

                                    Completed

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted py-5">

                                No completed challenges yet.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection