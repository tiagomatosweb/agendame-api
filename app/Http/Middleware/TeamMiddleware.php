<?php

namespace App\Http\Middleware;

use App\Models\Team;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        auth()->loginUsingId(10);
        if (!$request->headers->has('Team')) {
            dd('error não tem team id');
        }

        $team = Team::query()
            ->whereToken($request->header('Team'))
            ->first();

        if (!$team) {
            dd('team não existe');
        }

        setPermissionsTeamId($team->id);

        if (!auth()->user()->roles()->exists()) {
            dd('não tenho cargo');
        }

        return $next($request);
    }
}
