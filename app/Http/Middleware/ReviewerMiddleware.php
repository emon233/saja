<?php

namespace App\Http\Middleware;

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
        if (!Reviewer::isReviewer()) {
            return abort(403);
        }
        return $next($request);
    }
}
