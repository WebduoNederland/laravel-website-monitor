<div>
    <x-heading
        :title="__('Websites')"
        :description="__('Create, manage and view all of your websites')"
    >
        <x-button.primary wire:click="$toggle('showWebsiteCreation')">@lang('Add website')</x-button.primary>
    </x-heading>

    @if ($showWebsiteCreation)
        <x-popup-form
            wire:submit="addWebsite"
            :title="__('New website')"
            :description="__('Add a new website to your team')"
            width="md"
        >
            <x-slot:content>
                <x-label text="Domain">
                    <x-form.input type="text" :placeholder="__('example.com')" wire:model="newWebsiteDomain" />
                </x-label>
                <x-label text="Name">
                    <x-form.input type="text" :placeholder="__('Friendly name')" wire:model="newWebsiteName" />
                </x-label>
            </x-slot:content>

            <x-slot:actions>
                <x-button.primary wire:click="addWebsite">@lang('Save')</x-button.primary>
                <x-button.index wire:click="$toggle('showWebsiteCreation')">@lang('Cancel')</x-button.index>
            </x-slot:actions>
        </x-popup-form>
    @endif

    <livewire:app.websites.website-list />
</div>
