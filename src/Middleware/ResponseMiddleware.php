<?php

namespace Daviswwang\LaravelHelper\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ResponseMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //只处理 JsonResponse
        if (!$response instanceof JsonResponse && !$response instanceof Response) return $response;

        if (isset($response->exception)) return $response;
        // Perform action
        $res = $response->getOriginalContent();

        if (!isset($res['code']) || !in_array($res['code'], [200, 404, 400, 401, 300, 40001, 40002, 40003, 40004])) {
            $res = [
                'code' => 200,
                'data' => $res,
            ];
        }

        return response()->json($res);
    }
}
