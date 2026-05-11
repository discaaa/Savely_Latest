@extends('components.layout.sidebar')

@section('content')
<div class="row gx-5 gy-4">
    <!-- Section kiri -->
    <div class="col-3">

        <div class="d-flex flex-column gap-4">
            
            {{-- Account Card --}}
            <div class="fw-bold card p-3 shadow-sm mb-3" style="width: 550px; height:300px">
                <h3>Account Name</h3>
                <h4>January Saving</h4>
                <h1>Rp 2.400.000</h1> {{-- database --}}
            </div>
            
            <div class="d-flex gap-5">
                <div class="fw-bold card p-3 shadow-sm mb-3" style="width: 500px; height: 200px">
                    {{-- di integrate sesuai database --}}
                    <h5>This Month</h5>
                    <h2>Rp 1.200.000 / 2.400.000</h2> {{-- database --}}
                    
                    {{-- progressbar - nnti integrate ke database --}}
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                </div>

                <div class="fw-bold card p-3 shadow-sm" style="width: 500px; height: 200px">
                    {{-- Account Card --}}
                    <h5>Account Name</h5>
                    <h6>January Saving</h6>
                    <h2>Rp 2.400.000</h2> {{-- database --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Section kanan  --}}
    <div class="col-7">

        {{-- Card Saving per Month --}}
        <div class="fw-bold card p-3 shadow-sm mb-3" style="width: 600px; height:500px">
            <div class="text-muted mb-5">
                    <h2>January Saving</h2>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week1</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 50%;"                            
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        50%
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week2</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 100%;"                            
                        aria-valuenow="100"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        100%
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week3</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 70%;"                            
                        aria-valuenow="70"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        70%
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week4</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 30%;"                            
                        aria-valuenow="30"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        30%
                    </div>
                </div>
            </div>
        </div>

        <div class="fw-bold card p-3 shadow-sm mb-3" style="width: 600px; height:500px">
            <div class="text-muted mb-5">
                    <h2>February Saving</h2>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week1</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 50%;"                            
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        50%
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week2</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 100%;"                            
                        aria-valuenow="100"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        100%
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week3</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 70%;"                            
                        aria-valuenow="70"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        70%
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3 mb-2">
                <h3 class="mb-5">Week4</h3>
                <div class="progress w-100" style="height: 30px">
                    <div 
                        class="progress-bar"
                        role="progressbar"
                        style="width: 30%;"                            
                        aria-valuenow="30"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        30%
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-2">
        {{-- Buttons Daily atau Goals --}}
        <a href="/daily" class="btn btn-primary fs-2" style="width: 150px; height:120px">
            Daily Saving
        </a>
        
        <a href="/goalsave" class="btn btn-outline-primary fs-2" style="width: 150px; height:120px">
            Goals Saving
        </a>
        </div>
    </div>
</div>
@endsection