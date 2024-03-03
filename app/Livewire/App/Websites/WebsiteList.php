<?php

namespace App\Livewire\App\Websites;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class WebsiteList extends Component
{
    use WithPagination;

    public function render(): View
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var LengthAwarePaginator $websites */
        $websites = $user->activeTeam
            ->websites()
            ->with('monitorEntriesLatest')
            ->paginate(4);

        return view('livewire.app.websites.website-list', [
            'websites' => $websites,
        ]);
    }
}
