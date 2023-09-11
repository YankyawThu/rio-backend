<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $string = 'rio$ports2023';
        $token = $request->header('Authorization');
        if($token) {
            $iv = 'ldXeDnI2kgGjtNa0';
            $key = '2358421702345956';
            $method = "AES-128-CBC";
            $token = base64_decode($token);
            $decryptedString = openssl_decrypt($token, $method, $key, OPENSSL_RAW_DATA, $iv);
            if($decryptedString != $string) {
                return resBadRequest('Access denied');
            }
            else return $next($request);
        }
        else return resBadRequest('Authorized Token Not Found');
    }
}
