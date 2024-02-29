<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Enumerable;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 * @property ?User $user
 * @property Enumerable<int, Website> $websites
 */
class Team extends Model
{
    protected $guarded = [
        //
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function websites(): HasMany
    {
        return $this->hasMany(Website::class, 'team_id', 'id');
    }
}
