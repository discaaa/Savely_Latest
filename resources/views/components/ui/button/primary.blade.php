<style>
    .add-btn{
        background-color: #6f2cff;
        color: white;
        border-radius: 20px;
        border: none;
        padding: 8px 18px;
        font-weight: 600;
        box-shadow: 0 4px 20px rgba(124, 58, 237, 0.2);

    }
</style>

<button {{ $attributes->merge(['class' => 'add-btn']) }}>
    {{ $slot }}
</button>