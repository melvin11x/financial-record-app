<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        $authenticated = true;

        if (!$loginToken) {
            $authenticated = false;
        } else {
            $user = User::find($loginToken->user_id);

            if ($user->role != 'admin') {
                $authenticated = false;
            }
        }

        if (!$authenticated) {
            abort(404);
        }

        return $next($request);
    }
}
