<label {{ $attributes->merge([
    "class" => "block text-gray-700"
]) }}>
    <p class="text-sm font-semibold mb-1">{{ $text }}</p>
    {{ $slot }}
</label>