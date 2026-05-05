@props([
    'value' => 0 // persen
])

<div class="w-full bg-gray-200 rounded-full h-3">
    <div 
        class="bg-blue-500 h-3 rounded-full"
        style="width: {{ $value }}%">
    </div>
</div>