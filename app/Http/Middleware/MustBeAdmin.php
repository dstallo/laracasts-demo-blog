<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() ?-> username !== 'dstallo') {
            return abort(Response::HTTP_FORBIDDEN);
        }
        
        return $next($request);
    }
}
