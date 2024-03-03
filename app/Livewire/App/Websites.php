<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class Websites extends Component
{
    public bool $showWebsiteCreation = false;

    public string $newWebsiteDomain = '';

    public string $newWebsiteName = '';

    public function addWebsite(): void
    {
        $this->validate([
            'newWebsiteDomain' => 'required',
            'newWebsiteName' => 'required',
        ]);

        /** @var User $user */
        $user = auth()->user();

        $user->activeTeam->websites()->create([
            'created_by_id' => $user->id,
            'updated_by_id' => $user->id,
            'domain' => $this->newWebsiteDomain,
            'name' => $this->newWebsiteName,
            'api_key' => Str::upper(Str::random(8)).'-'.Str::upper(Str::random(8)).'-'.Str::upper(Str::random(8)),
        ]);

        $this->showWebsiteCreation = false;

        // TODO: Toast notification
    }

    public function render(): View
    {
        return view('livewire.app.websites')
            ->title('Websites');
    }
}
