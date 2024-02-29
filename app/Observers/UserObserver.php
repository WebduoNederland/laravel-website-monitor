<?php

namespace App\Observers;

use App\Models\Team;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        $name = $user->name;

        /** @var Team $team */
        $team = Team::create([
            'user_id' => $user->id,
            'name' => $name.'\'s team',
        ]);

        $user->active_team_id = $team->id;

        $user->save();
    }

    public function updated(User $user): void
    {
        //
    }

    public function deleted(User $user): void
    {
        //
    }

    public function restored(User $user): void
    {
        //
    }

    public function forceDeleted(User $user): void
    {
        //
    }
}
