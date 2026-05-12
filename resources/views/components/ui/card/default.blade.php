<style>
    .custom-card{
        border-radius: 25px;
        border: 2px solid #7c3aed;
        background: white;
        box-shadow: 0 4px 20px rgba(124, 58, 237, 0.2);
    }
</style>

<div {{ $attributes->merge(['class' => 'custom-card p-4 mb-3']) }}>
    
    @isset($title)
        <h2 class="fw-bold mb-3">{{ $title }}</h2>
    @endisset

    {{ $slot }}

</div>