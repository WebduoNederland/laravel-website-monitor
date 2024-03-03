<div class="w-full p-5 space-y-8" wire:poll.10s>
    <div class="flex items-center justify-between">
        <div></div>
        <div>
            <x-form.input :placeholder="__('Search')" wire:model.live="search" />
        </div>
    </div>

    @forelse ($websites as $website)
        <x-website-row :website="$website" />
    @empty
        @if (blank($search))
            <x-no-records icon="heroicon-o-plus" :text="__('Add a new website')" wire:click="$parent.$toggle('showWebsiteCreation')" />
        @else
            <x-no-records icon="heroicon-o-plus" :text="__('Website \':search\' not found, do you want to create it?', ['search' => $search])" wire:click="$parent.$toggle('showWebsiteCreation')" />
        @endif
    @endforelse

    {{ $websites->links() }}
</div>