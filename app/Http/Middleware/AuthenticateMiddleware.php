<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && Cookie::has('remember_me')) {
            $cookieToken = Cookie::get('remember_me');
            $hashedToken = hash('sha256', $cookieToken);
    
            $member = Member::where('remember_token', $hashedToken)->first();
    
            if ($member) {
                Auth::login($member);
            }
        }
    
        return $next($request);
    }
}
