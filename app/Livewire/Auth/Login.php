<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

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

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            request()->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        $this->addError('combination', __('The given combination of the email address and password is not recognized'));

        return null;
    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.guest');
    }
}
