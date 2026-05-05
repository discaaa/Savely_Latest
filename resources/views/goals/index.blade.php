@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>My Goals</h4>
        <a href="{{ route('goals.create') }}" class="btn btn-primary">
            + New Goal
        </a>
    </div>

    <!-- Summary -->
    <div class="row mb-4">
        <div class="col-md-3">
            <x-ui.card.default>Total Goals: 8</x-ui.card.default>
        </div>
        <div class="col-md-3">
            <x-ui.card.default>Total Target: Rp 25jt</x-ui.card.default>
        </div>
        <div class="col-md-3">
            <x-ui.card.default>Total Saved: Rp 10jt</x-ui.card.default>
        </div>
        <div class="col-md-3">
            <x-ui.card.default>Achieved: 3</x-ui.card.default>
        </div>
    </div>

    <!-- Goal List -->
    @php
        $goals = [
            ['name' => 'Laptop', 'target' => 10000000, 'progress' => 60],
            ['name' => 'Vacation', 'target' => 5000000, 'progress' => 30],
        ];
    @endphp

    @foreach ($goals as $goal)
        <x-ui.card.goal-item :goal="$goal" />
    @endforeach

</div>

@endsection