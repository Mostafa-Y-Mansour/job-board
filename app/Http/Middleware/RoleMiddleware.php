<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // this role middleware is already inside an auth middleware it will only work if the user is logged in
        // check again if user is authenticated
        if (auth()->check()) {
            // check the user role if it match the authorized role in th roles array
            $role = auth()->user()->role;
            $hasAccess = in_array($role, $roles);
            // if not abort
            if (!$hasAccess) {
                print_r($roles);
                echo "<br />";
                print("role: " . $role);
                abort(403, "you are not authorized to do this action");
            }
        }
        // other than that proceed
        return $next($request);
    }
}
