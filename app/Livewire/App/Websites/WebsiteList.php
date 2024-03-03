<?php

namespace App\Livewire\App\Websites;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class WebsiteList extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public function render(): View
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var LengthAwarePaginator $websites */
        $websites = $user->activeTeam
            ->websites()
            ->with('monitorEntriesLatest')
            ->when(! blank($this->search), fn ($query) => $query->where('domain', 'like', "%$this->search%")->orWhere('name', 'like', "%$this->search%"))
            ->paginate(4);

        return view('livewire.app.websites.website-list', [
            'websites' => $websites,
        ]);
    }
}
