<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;

class TeamPolicy
{
    public function update(User $user, Team $team)
    {
        setPermissionsTeamId($team->id);

        return $user->hasRole('admin');
    }
}
