<div @class([
    "h-screen py-5 px-5 transition-all ease-in-out relative",
    "w-[400px]" => $open,
    "w-[100px]" => ! $open,
])>
    @if ($open)
        <h2 class="text-2xl text-white">{{ config('app.name') }}</h2>
    @endif

    <div class="w-full my-5 space-y-2">
        <a href="{{ route('dashboard') }}" wire:navigate class="block">
            <x-menu.item :active="$routeName === 'dashboard'"><x-heroicon-o-home @class(["w-5 h-5 mr-2", "mx-auto" => ! $open]) />@if($open)@lang('Dashboard')@endif</x-menu.item>
        </a>

        <a href="{{ route('websites') }}" wire:navigate class="block">
            <x-menu.item :active="$routeName === 'websites'"><x-heroicon-o-globe-alt @class(["w-5 h-5 mr-2", "mx-auto" => ! $open]) />@if($open)@lang('Websites')@endif</x-menu.item>
        </a>
    </div>

    <div class="top-1/2 -right-4 absolute">
        <button class="w-8 h-8 bg-white rounded-full border border-gray-200 flex items-center justify-center opacity-90 hover:opacity-100 transition-opacity" wire:click="changeMenuState()">
            <x-heroicon-o-chevron-right @class(["w-5 h-5", "rotate-180" => ! $open]) />
        </button>
    </div>
</div>
