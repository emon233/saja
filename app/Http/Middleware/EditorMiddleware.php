<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Editor;

class EditorMiddleware
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
        if (!Editor::isEditor()) {
            return abort(403);
        }
        return $next($request);
    }
}
