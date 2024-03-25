<?php

namespace App\Http\Middleware;

use App\Exceptions\MissingTeamException;
use App\Exceptions\TeamDoesntExistException;
use App\Exceptions\UserDoesntHaveRoleException;
use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws MissingTeamException
     * @throws TeamDoesntExistException
     * @throws UserDoesntHaveRoleException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->headers->has('Team')) {
            throw new MissingTeamException();
        }

        $team = Team::query()
            ->whereToken($request->header('Team'))
            ->first();

        if (!$team) {
            throw new TeamDoesntExistException();
        }

        setPermissionsTeamId($team->id);

        if (!auth()->user()->roles()->exists()) {
            throw new UserDoesntHaveRoleException();
        }

        return $next($request);
    }
}
