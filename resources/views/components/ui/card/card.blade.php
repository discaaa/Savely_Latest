<div {{ $attributes->merge(['class' => 'card border-0 shadow-sm rounded-4']) }}>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>