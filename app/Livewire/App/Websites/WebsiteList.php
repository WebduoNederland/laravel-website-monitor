<?php

namespace App\Livewire\App\Websites;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

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
            ->when(! blank($this->search), fn (Builder $query): Builder => $query->where('domain', 'like', "%$this->search%")->orWhere('name', 'like', "%$this->search%"))
            ->paginate(4);

        return view('livewire.app.websites.website-list', [
            'websites' => $websites,
        ]);
    }
}
