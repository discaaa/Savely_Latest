@props([
    'value' => 0,
    'color' => 'primary'
])

<div class="progress">
    <div 
        class="progress-bar bg-{{ $color }}"
        role="progressbar"
        style="width: {{ $value }}%;"
        aria-valuenow="{{ $value }}"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        {{ $value }}%
    </div>
</div>