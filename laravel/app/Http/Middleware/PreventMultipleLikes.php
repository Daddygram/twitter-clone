<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventMultipleLikes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $idea = $request->route('idea');

        if ($idea && auth()->user()->likesIdea($idea)) {
            return redirect()->back()->with('message', 'You have already liked this idea.');
        }

        return $next($request);
    }
}
