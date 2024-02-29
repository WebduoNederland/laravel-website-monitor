<button {{ $attributes->merge([
    "class" => "px-5 py-2 rounded-md transition-colors"
]) }} wire:loading.class="opacity-50">{{ $slot }}</button>