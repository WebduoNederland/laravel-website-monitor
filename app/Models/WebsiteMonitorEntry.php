<?php

namespace App\Models;

use App\Observers\WebsiteMonitorEntryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $website_id
 * @property array $data
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?Website $website
 */
#[ObservedBy(WebsiteMonitorEntryObserver::class)]
class WebsiteMonitorEntry extends Model
{
    protected $guarded = [
        //
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class, 'website_id', 'id');
    }

    /**
     * CPU value formatting
     */
    public function getCurrentCpuUsageAttribute(): int
    {
        return data_get($this->data, 'cpu.current', '-');
    }

    /**
     * Memory value formatting
     */
    public function getCurrentMemoryUsageAttribute(): string
    {
        /** @var int $value */
        $value = data_get($this->data, 'memory.used', 0);

        return number_format($value, 0, ',', '.');
    }

    public function getCurrentMemoryTotalAttribute(): string
    {
        /** @var int $value */
        $value = data_get($this->data, 'memory.total', 0);

        return number_format($value, 0, ',', '.');
    }

    /**
     * Disk value formatting
     */
    public function getCurrentDiskUsagePercentageAttribute(): float
    {
        /** @var int $used */
        $used = data_get($this->data, 'disk.used', 0);
        /** @var int $total */
        $total = data_get($this->data, 'disk.total', 0);

        return round(($used / $total) * 100, 2);
    }

    public function getCurrentDiskUsageAttribute(): float
    {
        /** @var int $value */
        $value = data_get($this->data, 'disk.used', 0);

        return round($value / 1024, 2);
    }

    public function getCurrentDiskTotalAttribute(): float
    {
        /** @var int $value */
        $value = data_get($this->data, 'disk.total', 0);

        return round($value / 1024, 2);
    }
}
