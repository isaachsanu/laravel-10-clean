<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = JWTAuth::parseToken();

            if (!$token->authenticate()) {
                throw new UnauthorizedHttpException('jwt-auth', 'User not found');
            }
        } catch (\Throwable $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                throw new UnauthorizedHttpException('jwt-auth', 'Token expired');
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                throw new UnauthorizedHttpException('jwt-auth', 'Invalid token');
            } else {
                throw new UnauthorizedHttpException('jwt-auth', 'Token not found');
            }
        }

        return $next($request);
    }
}
