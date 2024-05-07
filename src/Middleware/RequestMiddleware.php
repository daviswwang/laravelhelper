<?php

namespace Daviswwang\LaravelHelper\Middleware;

use Closure;
use Illuminate\Support\Arr;

class RequestMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('get')) $request->replace(Arr::where($request->all(), function ($value) {
            return !is_null($value) && $value !== '';
        }));

        app()->bind('limit', function () use ($request) {
            return $request->input('limit', 15);
        });
        
        return $next($request);
    }
}
