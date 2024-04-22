<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        setPermissionsTeamId($this->id);
        $user = auth()->user();
        $user->unsetRelation('roles')->unsetRelation('permissions');

        return [
            'token' => $this->token,
            'name' => $this->name,
            'roles' => RoleResource::collection($user->roles),
            'default' => auth()->user()->default_team_id === $this->id,
        ];
    }
}
