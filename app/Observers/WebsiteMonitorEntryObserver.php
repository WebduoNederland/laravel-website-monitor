<?php

namespace App\Observers;

use App\Models\Website;
use App\Models\WebsiteMonitorEntry;

class WebsiteMonitorEntryObserver
{
    public function created(WebsiteMonitorEntry $websiteMonitorEntry): void
    {
        Website::withoutEvents(function () use ($websiteMonitorEntry): void {
            $website = $websiteMonitorEntry->website;

            if (! $website) {
                return;
            }
            
            $website->timestamps = false;

            $website->update([
                'last_heartbeat_received' => $websiteMonitorEntry->created_at,
            ]);
        });
    }
}
