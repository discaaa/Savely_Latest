@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f5f3ff;
    }

    .detail-card{
        background: white;
        border-radius: 30px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(111,44,255,0.08);
        border: 1px solid #ede9fe;
    }

    .section-title{
        font-weight: 800;
        color: #5b21b6;
    }

    .section-subtitle{
        color: #6b7280;
        font-size: 15px;
    }

    .goal-img{
        width: 190px;
        height: 190px;
        object-fit: cover;
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
        padding: 12px 28px;
        background: white;
        font-weight: 700;
        text-decoration: none;
        transition: 0.3s;
    }

    .outline-btn:hover{
        background: #f3e8ff;
        color: #6f2cff;
    }

    .info-title{
        color: #6b7280;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .info-value{
        font-size: 30px;
        font-weight: 800;
        color: #111827;
    }

    .progress{
        height: 14px;
        border-radius: 999px;
        background: #ede9fe;
        overflow: hidden;
    }

    .progress-bar{
        background: linear-gradient(
            90deg,
            #6f2cff,
            #9333ea
        );
    }

    .status-badge{
        background: #f3e8ff;
        color: #6f2cff;
        padding: 8px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }

    .action-icon{
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: white;
        border: 1px solid #e9d5ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6f2cff;
        transition: 0.3s;
    }

    .action-icon:hover{
        background: #f3e8ff;
    }

</style>

@php

    $target = $goal->target_amount ?? 0;

    $saved = $goal->saved_amount ?? 0;

    $progress = $target > 0
        ? round(($saved / $target) * 100)
        : 0;

@endphp

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="section-title mb-1">

                {{ $goal->name ?? 'No Title' }}

            </h2>

            <span class="status-badge">

                {{ $goal->status ?? 'In Progress' }}

            </span>

        </div>

        <div class="d-flex gap-3">

            <a href="{{ route('goals.edit', $goal->id) }}"
               class="action-icon text-decoration-none">

                <i class="bi bi-pencil-square"></i>

            </a>

            <button class="action-icon border-0">

                <i class="bi bi-three-dots"></i>

            </button>

        </div>

    </div>

    <div class="detail-card">

        <div class="row align-items-center g-5">

            <div class="col-lg-5 text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                     class="goal-img">

            </div>

            <div class="col-lg-7">

                <div class="mb-4">

                    <p class="info-title">
                        Target Amount
                    </p>

                    <h3 class="info-value">

                        Rp {{ number_format(
                            $target,
                            0,
                            ',',
                            '.'
                        ) }}

                    </h3>

                </div>

                <div class="mb-4">

                    <p class="info-title">
                        Saved Amount
                    </p>

                    <h3 class="info-value">

                        Rp {{ number_format(
                            $saved,
                            0,
                            ',',
                            '.'
                        ) }}

                    </h3>

                </div>

                <div class="mb-4">

                    <p class="info-title">
                        Progress
                    </p>

                    <h3 class="info-value">

                        {{ $progress }}%

                    </h3>

                </div>

                <div class="progress mb-5">

                    <div class="progress-bar"
                         style="width: {{ $progress }}%">

                    </div>

                </div>

                <div class="d-flex gap-3">

                    <a href="#"
                       class="purple-btn">

                        Add Saving

                    </a>

                    <a href="#"
                       class="outline-btn">

                        Withdraw

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection