<form wire:submit="register">
    <input type="text" wire:model="name" placeholder="Name">
    <input type="text" wire:model="email" placeholder="Email">
    <input type="password" wire:model="password" placeholder="Password">
    <input type="password" wire:model="password_confirmation" placeholder="Password bevestiging">
    <button class="bg-white">Register</button>
</form>