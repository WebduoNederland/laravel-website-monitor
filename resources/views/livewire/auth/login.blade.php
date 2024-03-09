<div class="w-full flex flex-col items-center max-md:px-5 md:pt-40">
    <h1 class="text-2xl font-semibold text-center my-5 text-primary">@lang('Sign in to your account')</h1>

    <form wire:submit="login" class="bg-white p-4 rounded-md w-full max-w-[400px] space-y-3">
        <x-label :text="$errors->first('combination')" class="w-full text-red-400" />

        <x-label :text="$errors->first('email')" @class(["w-full", "text-red-400" => $errors->has('email')])>
            <x-form.input type="email" wire:model="email" :placeholder="__('Email')" class="w-full" required />
        </x-label>

        <x-label :text="$errors->first('password')" @class(["w-full", "text-red-400" => $errors->has('password')])>
            <x-form.input type="password" wire:model="password" :placeholder="__('Password')" class="w-full" required />
        </x-label>

        <x-form.checkbox :label="__('Remember me')" model="remember" />
        
        <div class="space-y-2">
            <x-button.primary type="submit" class="w-full">@lang('Login')</x-button.primary>
            @if (config('laravel-website-monitor.allow_registration'))
                <div class="w-full flex items-center space-x-5">
                    <div class="w-1/2 h-0.5 bg-gray-100 rounded-l"></div>
                    <span>@lang('OR')</span>
                    <div class="w-1/2 h-0.5 bg-gray-100 rounded-r"></div>
                </div>
                <a href="{{ route('register') }}" class="block" wire:navigate><x-button.secondary type="button" class="w-full">@lang('Create new account')</x-button.secondary></a>
            @endif
        </div>
    </form>
</div>
