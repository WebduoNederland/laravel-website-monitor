<?php

namespace App\Livewire\App\Components;

use Livewire\Component;

class Menu extends Component
{
    public bool $open = true;

    public ?string $routeName = null;

    public function mount(): void
    {
        $this->routeName = request()->route()->getName();

        $this->open = session('menu_open', true);
    }

    public function changeMenuState(): void
    {
        $this->open = ! $this->open;

        session(['menu_open' => $this->open]);
    }

    public function render()
    {
        return view('livewire.app.components.menu');
    }
}
