<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventMultipleFollows
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->route('user');

        if ($user && auth()->user()->follows($user)) {
            return redirect()->back()->with('message', 'You are already following this user.');
        }
        return $next($request);
    }
}
