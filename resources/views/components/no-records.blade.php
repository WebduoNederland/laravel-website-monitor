<div {{ $attributes->merge([
    "class" => "w-full max-w-[500px] mx-auto border-2 border-gray-300 border-dashed rounded-md flex justify-center items-center space-y-3 flex-col p-10 cursor-pointer hover:bg-gray-50 transition-colors",
]) }}>
    <div><x-dynamic-component :component="$icon" class="w-10 h-10 text-gray-300" /></div>
    <p class="text-base text-center font-medium">{{ $text }}</p>
</div>