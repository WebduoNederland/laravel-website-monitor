<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function login(): mixed
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            request()->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        $this->addError('combination', __('The given combination of the email address and password is not recognized'));

        return null;
    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.guest')
            ->title('Login');
    }
}
