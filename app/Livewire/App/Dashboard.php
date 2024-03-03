<?php

namespace App\Livewire\App;

use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.app.dashboard')
            ->title('Dashboard');
    }
}
