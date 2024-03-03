<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(): void
    {
        if (! config('laravel-website-monitor.allow_registration')) {
            abort(403);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'confirmed',
                Password::min(8)->mixedCase()->numbers(),
            ],
        ];
    }

    public function register(): void
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('components.layouts.guest');
    }
}
