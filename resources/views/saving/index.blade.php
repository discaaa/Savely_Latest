@extends('components.layout.sidebar')

@section('content')
<div class="container-fluid">
    
    <!-- Section atas -->
    <div class="d-flex justify-content-between align-items-center">
        
        {{-- Account Card --}}
        <div class="fw-bold card p-3 shadow-sm mb-3" style="width: 500px; height:200px">
            <h5>Account Name</h5>
            <h6>January Saving</h6>
            <h2>Rp 2.400.000</h2> {{-- database --}}
        </div>

        {{-- Buttons Daily atau Goals --}}
        <div class="d-flex gap-4">
            <div class="btn btn-primary">
                Daily Saving
            </div>

            <div class="d-flex gap-5">
                <div class="btn btn-outline-primary">
                    Goals Saving
                </div>
            </div>
        </div>
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
        <x-ui.card.default style="width: 500px; height: 500px">
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
        </x-ui.card.default>
    </div>

</div>
@endsection