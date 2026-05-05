@props(['id'])

<div id="{{ $id }}" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
    <div class="bg-white rounded-xl p-6 w-96">
        {{ $slot }}
        
        <div class="mt-4 text-right">
            <button onclick="document.getElementById('{{ $id }}').classList.add('hidden')">
                Close
            </button>
        </div>
    </div>
</div>