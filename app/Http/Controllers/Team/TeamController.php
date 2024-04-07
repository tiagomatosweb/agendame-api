<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Http\Requests\Team\TeamUpdateRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $user = auth()->user();
        return TeamResource::collection($user->teams);
    }

    /**
     * @param TeamStoreRequest $request
     * @return TeamResource
     */
    public function store(TeamStoreRequest $request): TeamResource
    {
        $input = $request->validated();
        $input['token'] = Str::uuid();

        $team = Team::query()->create($input);

        $user = auth()->user();
        setPermissionsTeamId($team->id);
        $user->assignRole('admin');

        return new TeamResource($team);
    }

    /**
     * @param Team $team
     * @param TeamUpdateRequest $request
     * @return TeamResource
     * @throws AuthorizationException
     */
    public function update(Team $team, TeamUpdateRequest $request): TeamResource
    {
        $this->authorize('update', $team);

        $input = $request->validated();

        $team->fill($input);
        $team->save();

        return new TeamResource($team);
    }

    /**
     * @param Team $team
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(Team $team): void
    {
        $this->authorize('destroy', $team);

        \DB::table('model_has_roles')
            ->where('team_id', $team->id)
            ->delete();

        $team->delete();
    }
}
