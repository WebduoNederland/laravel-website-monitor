<div class="w-full flex items-center justify-between p-5 border-b border-b-gray-200 shadow-sm mb-5">
    <div>
        <h2 class="text-2xl font-medium text-primary">{{ $title }}</h2>
        <p class="text-base font-thin">{{ $description }}</p>
    </div>

    <div>
        {{ $slot }}
    </div>
</div>