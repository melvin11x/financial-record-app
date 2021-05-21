<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class JwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $loginToken = Token::where('token', session('token'))->first();

        $routeName = $request->route()->getName();
        $isPageAuth = $routeName == 'page.login' || $routeName == 'page.register';

        if($isPageAuth && $loginToken){
            $role = $loginToken->user->role;

            return redirect()->route("page.$role.dashboard");
        }else if (!$isPageAuth && !$loginToken) {
            return redirect()->route('page.login');
        }

        return $next($request);
    }
}
