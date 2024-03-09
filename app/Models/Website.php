<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Enumerable;

/**
 * @property int $id
 * @property int $team_id
 * @property int $created_by_id
 * @property int $updated_by_id
 * @property string $domain
 * @property string $name
 * @property string $api_key
 * @property ?Carbon $last_heartbeat_received
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?Carbon $deleted_at
 * @property ?Team $team
 * @property Enumerable<int, WebsiteMonitorEntry> $monitorEntries
 * @property WebsiteMonitorEntry $monitorEntriesLatest
 */
class Website extends Model
{
    use SoftDeletes;

    protected $guarded = [
        //
    ];

    protected $casts = [
        'last_heartbeat_received' => 'datetime',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function monitorEntries(): HasMany
    {
        return $this->hasMany(WebsiteMonitorEntry::class, 'website_id', 'id');
    }

    public function monitorEntriesLatest(): HasOne
    {
        return $this->hasOne(WebsiteMonitorEntry::class, 'website_id', 'id')->latest();
    }

    public function getStatusAttribute(): string
    {
        if (! $this->last_heartbeat_received) {
            return 'pending';
        }

        if ($this->last_heartbeat_received->diffInSeconds() >= 50) {
            return 'offline';
        }

        return 'online';
    }
}
