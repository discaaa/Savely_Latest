@props(['variant' => 'primary'])

@php
    $classes = [
        'primary' => 'btn-primary',
        'danger' => 'btn-danger',
        'success' => 'btn-success',
        'secondary' => 'btn-secondary',
        'warning' => 'btn-warning',
        'info' => 'btn-info',
        'dark' => 'btn-dark',
    ];
@endphp

<button {{ $attributes->merge(['class' => 'btn ' . $classes[$variant]]) }}>
    {{ $slot }}
</button>