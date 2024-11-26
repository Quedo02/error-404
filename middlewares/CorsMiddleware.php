<?php

namespace Middlewares;

class CorsMiddleware
{
    public static function handle($next, $router = null)
    {
        header("Access-Control-Allow-Origin: http://localhost:3000");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header("Access-Control-Allow-Credentials: true");
        $next();
    }
}