<div class="border border-gray-200 rounded-md p-3 bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer">
    <div>
        <div @class([
            "px-2 py-1 rounded-full text-sm w-fit flex items-center justify-center",
            "bg-green-100/80 text-green-800" => $website->status === 'online',
            "bg-orange-100/80 text-orange-400" => $website->status === 'pending',
            "bg-red-100/80 text-red-800" => $website->status === 'offline',
        ])>
            <div @class([
                "w-3 h-3 rounded-full mr-1.5",
                "bg-green-400" => $website->status === 'online',
                "bg-orange-400" => $website->status === 'pending',
                "bg-red-400" => $website->status === 'offline',
            ])></div>
            <span class="capitalize">{{ $website->status }}</span>
        </div>
        <p class="font-semibold text-gray-700 mt-1">{{ $website->name }} <span class="!font-normal !text-sm !text-gray-400 ml-2">{{ $website->domain }}</span></p>
    </div>

    <div class="grid grid-cols-3 gap-x-3 mt-5">
        <div class="bg-white rounded-md shadow-sm p-2">
            <p class="text-gray-500">@lang('CPU')</p>
            <p class="text-primary font-bold text-2xl">{{ $website->monitorEntriesLatest?->current_cpu_usage ?? '-' }}%</p>
        </div>

        <div class="bg-white rounded-md shadow-sm p-2">
            <p class="text-gray-500">@lang('RAM')</p>
            <p class="text-primary font-bold text-2xl">{{ $website->monitorEntriesLatest?->current_memory_usage ?? '-' }}/{{ $website->monitorEntriesLatest?->current_memory_total ?? '-' }} <span class="text-lg text-gray-300">MB</span></p>
        </div>

        <div class="bg-white rounded-md shadow-sm p-2">
            <p class="text-gray-500">@lang('Disk')</p>
            <p class="text-primary font-bold text-2xl">{{ $website->monitorEntriesLatest?->current_disk_usage_percentage ?? '-' }}%</p>
        </div>
    </div>
</div>