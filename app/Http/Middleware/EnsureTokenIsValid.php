<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->header('my-x-token') !== 'xPHMPl3qUsD5ygIp/bSngsCt9qnPusimdrsPDam3FtI') {
            return redirect('/');
        }

        return $next($request);
    }
}
