<?php

namespace App\Http\Middleware;

use Session;
use Closure;

use App\Models\Reviewer;

class ReviewerMiddleware
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
        if (Session::get('role') != config('appConstants.roles.reviewer')) {
            return abort(403);
        }
        return $next($request);
    }
}
