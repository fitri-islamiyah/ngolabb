<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProjectLeader
{
    public function handle(Request $request, Closure $next)
    {
        $project = $request->route('project');

        if (!$project) {
            abort(404, 'Project not found');
        }

        $user = auth()->user();

        if (!$user || $user->pivotRole($project->id) !== 'leader') {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
