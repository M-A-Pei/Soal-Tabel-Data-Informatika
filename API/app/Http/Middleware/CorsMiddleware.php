<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Fruitcake\Cors\CorsService;

class CorsMiddleware
{
    protected $cors;

    public function __construct()
    {
        // Instantiate the CorsService here
        $this->cors = new CorsService([
            'allowedOrigins' => ['*'],
            'allowedMethods' => ['*'],
            'allowedHeaders' => ['*'],
            'supportsCredentials' => false,
        ]);
    }

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->cors->isPreflightRequest($request)) {
            $response = $this->cors->handlePreflightRequest($request);
        } else {
            $response = $next($request);
        }

        return $this->cors->addActualRequestHeaders($response, $request);
    }
}
