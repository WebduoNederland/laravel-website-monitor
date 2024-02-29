<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Dashboard' }} | Laravel Website Monitor</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-[#09090B] font-figtree antialiased">
        <div class="flex h-screen">
            <livewire:app.components.menu />

            <div class="w-full h-full overflow-y-auto bg-white rounded-l-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
