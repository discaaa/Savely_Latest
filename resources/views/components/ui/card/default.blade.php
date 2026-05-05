<div {{ $attributes->merge(['class' => 'bg-white shadow rounded-xl p-4']) }}>
    @isset($title)
        <h2 class="text-lg font-semibold mb-2">{{ $title }}</h2>
    @endisset

    {{ $slot }}
</div>