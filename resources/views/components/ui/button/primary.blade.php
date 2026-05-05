@props(['variant' => 'primary'])

@php
    $classes = [
        'primary' => 'btn-primary',
        'danger' => 'btn-danger',
        'success' => 'btn-success',
    ];
@endphp

<button {{ $attributes->merge(['class' => 'btn ' . $classes[$variant]]) }}>
    {{ $slot }}
</button>