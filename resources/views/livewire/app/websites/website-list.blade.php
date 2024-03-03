<div class="w-full p-5 space-y-8" wire:poll.10s>
    @forelse ($websites as $website)
        <x-website-row :website="$website" />
    @empty
        <x-no-records icon="heroicon-o-plus" :text="__('Add a new website')" wire:click="$parent.$toggle('showWebsiteCreation')" />
    @endforelse

    {{ $websites->links() }}
</div>