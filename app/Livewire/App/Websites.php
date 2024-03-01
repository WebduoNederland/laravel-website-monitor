<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Websites extends Component
{
    use WithPagination;

    public bool $showWebsiteCreation = false;

    public string $newWebsiteDomain = '';

    public string $newWebsiteName = '';

    public function addWebsite()
    {
        $this->validate([
            'newWebsiteDomain' => 'required',
            'newWebsiteName' => 'required',
        ]);

        /** @var User $user */
        $user = auth()->user();

        $website = $user->activeTeam->websites()->create([
            'created_by_id' => $user->id,
            'updated_by_id' => $user->id,
            'domain' => $this->newWebsiteDomain,
            'name' => $this->newWebsiteName,
            'api_key' => Str::upper(Str::random(8)).'-'.Str::upper(Str::random(8)).'-'.Str::upper(Str::random(8)),
        ]);

        $this->showWebsiteCreation = false;

        // TODO: Toast notification
    }

    public function render()
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var LengthAwarePaginator $websites */
        $websites = $user->activeTeam
            ->websites()
            ->with('monitorEntriesLatest')
            ->paginate(4);

        return view('livewire.app.websites', [
            'websites' => $websites,
        ])
            ->title('Websites');
    }
}
