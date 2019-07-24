<?php

namespace IPActive\Http\Middleware;


use Closure;
use IPActive\Http\Services\IPActiveService;

class IPActiveMiddleware
{
    protected $IPActiveService;

    public function __construct(IPActiveService $IPActiveService)
    {
        $this->IPActiveService = $IPActiveService;
    }

    public function handle($request, Closure $next, $action)
    {
        $result = $this->IPActiveService->checkTimeActiveLatest($action);

        if($result) {
            return $next($request);
        }
    }
}
