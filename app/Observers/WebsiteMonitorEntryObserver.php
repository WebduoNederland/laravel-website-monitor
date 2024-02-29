<?php

namespace App\Observers;

use App\Models\WebsiteMonitorEntry;

class WebsiteMonitorEntryObserver
{
    public function created(WebsiteMonitorEntry $websiteMonitorEntry): void
    {
        $websiteMonitorEntry->website->withoutTimestamps(fn () => $websiteMonitorEntry->website()->update([
            'last_heartbeat_received' => $websiteMonitorEntry->created_at,
        ]));
    }
}
