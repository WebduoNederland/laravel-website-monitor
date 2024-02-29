@props(["active"])
<button @class([
    "w-full flex items-center text-white hover:text-white/80 transition font-normal px-3 py-2 rounded-md border border-transparent",
    "bg-nav-active/50 !border-gray-800" => $active,
])>
    {{ $slot }}
</button>