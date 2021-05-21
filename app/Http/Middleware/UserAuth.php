<?php

namespace App\Http\Middleware;

use App\Models\History;
use App\Models\Token;
use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        $id = $request->route('history');
        $history = History::find($id);
        $loginToken = Token::where('token', session('token'))->first();
        $authenticated = true;

        if (!$history) {
            $authenticated = false;
        } else if ($history->user_id != $loginToken->user_id) {
            $authenticated = false;
        }

        if (!$authenticated) {
            return redirect()->route('page.histories.index')->with(['status' => 'error', 'message' => 'Data is not valid']);
        }

        return $next($request);
    }
}
