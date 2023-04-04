<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class checkProfileCompletness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user['approved'] != 1) {
            if (!$user->isComplete()) {
                return redirect('/edit_profile');
            }
        }

        return $next($request);
    }
}
