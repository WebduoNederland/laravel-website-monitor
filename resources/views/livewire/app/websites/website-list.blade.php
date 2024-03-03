<div class="w-full p-5 space-y-8" wire:poll.10s>
    @foreach ($websites as $website)
        <x-website-row :website="$website" />
    @endforeach

    {{ $websites->links() }}
</div>