@php($id = \Illuminate\Support\Str::random())
<div class="flex">
    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-primary focus:ring-primary disabled:opacity-50 disabled:pointer-events-none" id="{{ $id }}" wire:model="{{ $model }}">
    <label for="{{ $id }}" class="text-sm text-gray-500 ms-3">{{ $label }}</label>
</div>