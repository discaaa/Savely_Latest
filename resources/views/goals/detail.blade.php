@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .detail-header{
        margin-bottom: 30px;
    }

    .page-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .goal-status{
        background: #ede9fe;
        color: #6f2cff;
        padding: 8px 18px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
        display: inline-block;
        margin-top: 8px;
    }

    .action-icon{
        width: 42px;
        height: 42px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: 0.2s;
        border: none;
    }

    .edit-icon{
        background: #ede9fe;
        color: #6f2cff;
    }

    .delete-icon{
        background: #fee2e2;
        color: #dc2626;
    }

    .action-icon:hover{
        transform: translateY(-2px);
    }

    .detail-card{
        background: white;
        border-radius: 30px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
    }

    .goal-img{
        width: 230px;
        height: 230px;
        object-fit: cover;
        border-radius: 28px;
        box-shadow: 0 10px 20px rgba(111,44,255,0.12);
    }

    .label-title{
        color: #6b7280;
        font-size: 15px;
        margin-bottom: 6px;
    }

    .main-value{
        font-size: 30px;
        font-weight: 800;
        color: #111827;
    }

    .remaining-value{
        color: #dc2626;
        font-weight: 800;
        font-size: 24px;
    }

    .progress{
        height: 14px;
        border-radius: 999px;
        background: #ede9fe;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #7c3aed,
            #a855f7
        );
        border-radius: 999px;
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

    .outline-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        border-radius: 16px;
        padding: 13px 24px;
        background: white;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
    }

    .outline-btn:hover{
        background: #f3e8ff;
        color: #6f2cff;
    }

    .section-card{
        background: white;
        border-radius: 28px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
    }

    .section-title{
        font-weight: 800;
        color: #111827;
        margin-bottom: 24px;
    }

    .history-item{
        padding-bottom: 20px;
        margin-bottom: 20px;
        border-bottom: 1px solid #f1f1f1;
    }

    .history-item:last-child{
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .history-date{
        font-weight: 700;
        color: #111827;
    }

    .history-method{
        color: #6b7280;
        font-size: 14px;
    }

    .history-amount{
        color: #16a34a;
        font-weight: 800;
        font-size: 22px;
    }

</style>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center detail-header">

        <div>

            <h2 class="page-title">

                {{ $goal->title }}

            </h2>

            <span class="goal-status">

                {{ ucfirst($goal->status) }}

            </span>

        </div>

        <div class="d-flex gap-3">

            <a href="{{ route('goals.edit', $goal->id) }}"
               class="action-icon edit-icon">

                <i class="bi bi-pencil-square"></i>

            </a>

            <form action="{{ route('goals.destroy', $goal->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="action-icon delete-icon">

                    <i class="bi bi-trash"></i>

                </button>

            </form>

        </div>

    </div>

    @php

        $percentage = 0;

        if($goal->target_amount > 0){

            $percentage = min(
                100,
                round(
                    ($goal->current_amount /
                    $goal->target_amount) * 100
                )
            );
        }

        $remaining = $goal->target_amount - $goal->current_amount;

    @endphp

    <div class="detail-card mb-4">

        <div class="row align-items-center g-5">

            <div class="col-lg-5 text-center">

                @if($goal->image)

                    <img src="{{ asset('storage/' . $goal->image) }}"
                         class="goal-img">

                @else

                    <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                         class="goal-img">

                @endif

            </div>

            <div class="col-lg-7">

                <div class="mb-4">

                    <p class="label-title">
                        Target Amount
                    </p>

                    <h3 class="main-value">

                        Rp {{ number_format($goal->target_amount,0,',','.') }}

                    </h3>

                </div>

                <div class="mb-4">

                    <p class="label-title">
                        Saved Amount
                    </p>

                    <h3 class="main-value">

                        Rp {{ number_format($goal->current_amount,0,',','.') }}

                    </h3>

                </div>

                <div class="mb-4">

                    <p class="label-title">
                        Remaining
                    </p>

                    <h4 class="remaining-value">

                        Rp {{ number_format($remaining,0,',','.') }}

                    </h4>

                </div>

                <div class="mb-3">

                    <div class="d-flex justify-content-between mb-2">

                        <span class="label-title">
                            Progress
                        </span>

                        <span class="fw-bold text-primary">

                            {{ $percentage }}%

                        </span>

                    </div>

                    <div class="progress">

                        <div class="progress-bar"
                             style="width:{{ $percentage }}%">
                        </div>

                    </div>

                </div>

                @if($goal->target_date)

                    <p class="text-secondary mb-4">

                        Target Date :
                        {{ \Carbon\Carbon::parse($goal->target_date)->format('d F Y') }}

                    </p>

                @endif

                <div class="d-flex gap-3 flex-wrap">

                    <a href="{{ route('saving.create') }}"
                       class="purple-btn">

                        + Add Saving

                    </a>

                    <a href="{{ route('goals.edit', $goal->id) }}"
                       class="outline-btn">

                        Edit Goal

                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="section-card mb-4">

        <h4 class="section-title">
            Description
        </h4>

        <p class="text-secondary mb-0">

            {{ $goal->description ?? 'No description available.' }}

        </p>

    </div>

    <div class="section-card">

        <h4 class="section-title">
            Saving History
        </h4>

        @forelse($transactions as $transaction)

            <div class="history-item d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="history-date mb-1">

                        {{ \Carbon\Carbon::parse(
                            $transaction->saving_date
                        )->format('d F Y') }}

                    </h6>

                    <small class="history-method">

                        {{ $transaction->method }}

                    </small>

                </div>

                <div class="history-amount">

                    + Rp {{ number_format(
                        $transaction->amount,
                        0,
                        ',',
                        '.'
                    ) }}

                </div>

            </div>

        @empty

            <div class="text-center py-5">

                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
                     width="120"
                     class="mb-3">

                <h5 class="fw-bold">
                    No Saving History
                </h5>

                <p class="text-secondary mb-0">
                    Start adding savings to track your progress.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection