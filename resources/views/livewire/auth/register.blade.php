<div class="w-full flex flex-col items-center max-md:px-5 md:pt-40">
    <h1 class="text-2xl font-semibold text-center my-5 text-primary">@lang('Create a new account')</h1>

    <form wire:submit="register" class="bg-white p-4 rounded-md w-full max-w-[400px] space-y-3">
        <x-label :text="$errors->first('name')" @class(["w-full", "text-red-400" => $errors->has('name')])>
            <x-form.input type="text" wire:model="name" :placeholder="__('Name')" class="w-full" required />
        </x-label>
        <x-label :text="$errors->first('email')" @class(["w-full", "text-red-400" => $errors->has('email')])>
            <x-form.input type="email" wire:model="email" :placeholder="__('Email')" class="w-full" required />
        </x-label>
        <x-label :text="$errors->first('password')" @class(["w-full", "text-red-400" => $errors->has('password')])>
            <x-form.input type="password" wire:model="password" :placeholder="__('Password')" class="w-full" required />
        </x-label>
        <x-label :text="$errors->first('password_confirmation')" @class(["w-full", "text-red-400" => $errors->has('password_confirmation')])>
            <x-form.input type="password" wire:model="password_confirmation" :placeholder="__('Password confirmation')" class="w-full" required />
        </x-label>
        <div class="space-y-2">
            <x-button.primary type="submit" class="w-full">@lang('Register')</x-button.primary>
            <div class="w-full flex items-center space-x-5">
                <div class="w-1/2 h-0.5 bg-gray-100 rounded-l"></div>
                <span>@lang('OR')</span>
                <div class="w-1/2 h-0.5 bg-gray-100 rounded-r"></div>
            </div>
            <a href="{{ route('login') }}" class="block" wire:navigate><x-button.secondary type="button" class="w-full">@lang('Login to existing account')</x-button.secondary></a>
        </div>
    </form>
</div>
