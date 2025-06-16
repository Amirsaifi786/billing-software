<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $type ): Response
    {


        $user = Auth::user();
        // dd($user->role);die;
        if (!$user) {
            return redirect()->route('login');
        }

        // Check the role of the user
        if ($user->type != 1) {
            // return redirect()->route('dashboard');
            return redirect()->route('dashboard');
            // return redirect()->back()->with('error', 'You do not have access to this Admin page.');
  

        } elseif ($user->type != 2) {
           
            // return redirect()->route('staff.dashboard');
            return redirect()->route('manager.dashboard');
            // return redirect()->back()->with('error', 'You do not have access to this staff page.');
  

        } elseif ($user->type != 0) {
            // dd('client');

            // return redirect()->route('client.dashboard');
            return redirect()->route('user.dashboard');
            // return redirect()->back()->with('error', 'You do not have access to this Client page.');
  

        }
        return $next($request);
    }
}
