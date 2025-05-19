<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class StaffRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        // dd(auth()->user()->is_role); // This will show the role_id and stop execution here
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();


        if(in_array($user->is_role, $roles) || ($user->is_role === 2 && in_array(1, $roles))){
            return $next($request);
        }

        return match ($user->is_role) {
            1 => redirect()->route('adminmanager.dashboard'),
            2 => redirect()->route('adminmanager.dashboard'),
            default => redirect()->route('dashboard.home'),
        };

    }
}