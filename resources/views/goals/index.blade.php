@extends('components.layout.sidebar')

@section('content')

<style>

    body{
        background: #f7f7f7;
    }

    .purple-btn{
        background: #6f2cff;
        color: white;
        border-radius: 20px;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
    }

    .progress{
        height: 10px;
        border-radius: 20px;
    }

    .progress-bar{
        background: #7c3aed;
    }

</style>

<div class="container-fluid">

    {{-- header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">My Goals</h2>
            <p class="text-secondary">
                Plan your dreams, track your progress, achieve more.
            </p>
        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="/goals/create" class="purple-btn text-decoration-none">
                + New Goal
            </a>

            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                 width="50"
                 class="rounded-circle">

        </div>
    </div>

    {{-- statistics sesuai database --}}
    <div class="row mb-4">

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Total Goals</small>
                <h3 class="fw-bold">8</h3>
            </x-ui.card.default>
        </div>

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Total Target</small>
                <h3 class="fw-bold">Rp 25.300.000</h3>
            </x-ui.card.default>
        </div>

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Total Saved</small>
                <h3 class="fw-bold">Rp 10.350.000</h3>
            </x-ui.card.default>
        </div>

        <div class="col-md-3">
            <x-ui.card.default>
                <small>Goals Achieved</small>
                <h3 class="fw-bold text-success">3</h3>
            </x-ui.card.default>
        </div>

    </div>
    
    <hr class="mt-4 mb-4" style="border:5px solid #a855f7; border-radius:10px">

    {{-- tabs nnti sesuaiin database --}}
    <div class="d-flex gap-4 mb-4 fw-semibold">

        <a href="/goals"
        class="text-decoration-none
        {{ request('tab') == null ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">
            All Goals
        </a>

        <a href="/goals?tab=progress"
        class="text-decoration-none
        {{ request('tab') == 'progress' ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">
            In Progress
        </a>

        <a href="/goals?tab=completed"
        class="text-decoration-none
        {{ request('tab') == 'completed' ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">
            Completed
        </a>

        <a href="/goals?tab=hold"
        class="text-decoration-none
        {{ request('tab') == 'hold' ? 'text-primary border-bottom border-3 border-primary pb-2' : 'text-dark' }}">
            On Hold
        </a>

    </div>

    {{-- list goal sesuai database --}}
    @for($i = 0; $i < 4; $i++)

    <x-ui.card.default>

        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                {{-- Source img sesuai database --}}
                <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png"
                     width="60">

                <div>

                    <h5 class="fw-bold mb-1">
                        New Laptop
                    </h5>

                    <small class="text-secondary">
                        Target Rp 10.000.000
                    </small>

                    <div class="progress mt-2" style="width:250px;">
                        <div class="progress-bar"
                             style="width:62%">
                        </div>
                    </div>

                </div>

            </div>

            <div class="text-end">

                <h6 class="fw-bold">
                    Rp 6.200.000
                </h6>

                <small class="text-secondary d-block">
                    62%
                </small>

                <small class="text-secondary d-block mb-3">
                    Due in 60 days
                </small>

                <div class="d-flex gap-2 justify-content-end">

                    {{-- detail button --}}
                    <a href="/goals/detail"
                    class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        Detail
                    </a>

                    {{-- edit button --}}
                    <a href="/goals/edit"
                    class="btn btn-sm text-white rounded-pill px-3"
                    style="background:#6f2cff;">
                        Edit
                    </a>

                </div>

            </div>

        </div>

    </x-ui.card.default>

    @endfor

</div>

@endsection