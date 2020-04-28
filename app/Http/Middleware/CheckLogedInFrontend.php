<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckLogedInFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level == 1) {
                return $next($request);
            } else if ($user->level == 2) {
                return redirect()->route('getPage');
            } else {
                Auth::logout();
                return redirect()->route('getLogin');
            }
        } else {
            return redirect()->route('getPage');
        }

        return $next($request);
    }
}
