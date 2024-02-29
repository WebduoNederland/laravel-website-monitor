<div {{ $attributes->merge(["class" => "fixed top-0 left-0 w-screen h-screen bg-black/40 backdrop-blur-sm flex items-center justify-center"]) }}>
    <div @class([
        "bg-white rounded-md",
        "w-96" => $width === 'sm',
        'w-[500px]' => $width === 'md',
        'w-[800px]' => $width === 'xl',
    ])>
        <div class="border-b border-b-gray-200 shadow-sm p-5">
            <h2 class="text-2xl font-bold text-primary">{{ $title }}</h2>
            <p class="text-base font-normal text-gray-700">{{ $description }}</p>
        </div>

        <div class="p-5 space-y-3 flex flex-col">
            {{ $content }}
        </div>

        <div class="bg-gray-100 p-5 rounded-b-md">
            {{ $actions }}
        </div>
    </div>
</div>