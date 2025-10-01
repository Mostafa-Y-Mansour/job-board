<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check()) {
            if (auth()->user()->email === "a@a.com") {
                // Allow the request
                return $next($request);
            }
            return response(["message" => "You don't have access!"], Response::HTTP_FORBIDDEN);
        }

        return redirect("/login");
    }
}
