@extends('components.layout.sidebar')

@section('content')

<style>

    .purple-btn{
        background: #6f2cff;
        color: white;
        border-radius: 12px;
        padding: 10px 25px;
        border: none;
        font-weight: bold;
    }

    .outline-btn{
        border: 2px solid #6f2cff;
        color: #6f2cff;
        border-radius: 12px;
        padding: 10px 25px;
        background: white;
        font-weight: bold;
    }

    .goal-img{
        width: 180px;
        height: 180px;
        object-fit: cover;
    }

</style>

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <div>

            <h2 class="fw-bold">
                {{ $goal->title }}
            </h2>

            <small class="text-primary">

                {{ ucfirst($goal->status) }}

            </small>

        </div>

        <div class="d-flex gap-3 align-items-center">

            <a href="{{ route('goals.edit', $goal->id) }}"
               class="text-dark">

                <i class="bi bi-pencil-square"></i>

            </a>

            <form action="{{ route('goals.destroy', $goal->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="border-0 bg-transparent text-danger">

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

    <x-ui.card.default>

        <div class="row align-items-center">

            {{-- Goal Image --}}
            <div class="col-md-5 text-center">

                @if($goal->image)

                    <img src="{{ asset('storage/' . $goal->image) }}"
                         class="goal-img rounded">

                @else

                    <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                         class="goal-img">

                @endif

            </div>

            {{-- Goal Detail --}}
            <div class="col-md-7">

                <h6>
                    Target Amount
                </h6>

                <h3 class="fw-bold">

                    Rp {{ number_format($goal->target_amount,0,',','.') }}

                </h3>

                <h6 class="mt-4">
                    Saved Amount
                </h6>

                <h3 class="fw-bold">

                    Rp {{ number_format($goal->current_amount,0,',','.') }}

                </h3>

                <h6 class="mt-4">
                    Remaining
                </h6>

                <h5 class="fw-bold text-danger">

                    Rp {{ number_format($remaining,0,',','.') }}

                </h5>

                <h6 class="mt-4">
                    Progress
                </h6>

                <h3 class="fw-bold">

                    {{ $percentage }}%

                </h3>

                <div class="progress mb-3"
                     style="height:12px;">

                    <div class="progress-bar bg-primary"
                         style="width:{{ $percentage }}%">
                    </div>

                </div>

                @if($goal->target_date)

                    <small class="text-secondary d-block mb-4">

                        Target Date :
                        {{ \Carbon\Carbon::parse($goal->target_date)->format('d F Y') }}

                    </small>

                @endif

                <div class="d-flex gap-3">

                    <a href="{{ route('saving.create') }}"
                       class="purple-btn text-decoration-none">

                        Add Saving

                    </a>

                    <a href="{{ route('goals.edit', $goal->id) }}"
                       class="outline-btn text-decoration-none">

                        Edit Goal

                    </a>

                </div>

            </div>

        </div>

    </x-ui.card.default>

    {{-- Description --}}
    <x-ui.card.default class="mt-4">

        <h4 class="fw-bold mb-3">
            Description
        </h4>

        <p class="text-secondary mb-0">

            {{ $goal->description ?? 'No description available.' }}

        </p>

    </x-ui.card.default>

    {{-- Transaction History --}}
    <x-ui.card.default class="mt-4">

        <h4 class="fw-bold mb-4">
            Saving History
        </h4>

        @forelse($transactions as $transaction)

            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">

                <div>

                    <h6 class="fw-bold mb-1">

                        {{ \Carbon\Carbon::parse(
                            $transaction->saving_date
                        )->format('d F Y') }}

                    </h6>

                    <small class="text-secondary">

                        {{ $transaction->method }}

                    </small>

                </div>

                <div class="text-end">

                    <h5 class="fw-bold text-success">

                        + Rp {{ number_format(
                            $transaction->amount,
                            0,
                            ',',
                            '.'
                        ) }}

                    </h5>

                </div>

            </div>

        @empty

            <p class="text-secondary">
                No saving transaction yet.
            </p>

        @endforelse

    </x-ui.card.default>

</div>

@endsection