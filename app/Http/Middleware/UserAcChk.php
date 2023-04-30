<?php

namespace App\Http\Middleware;

use App\Models\user_device_ip;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserAcChk
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->account_status == 2) {
                return $next($request);
            }elseif (Auth::user()->account_status == 1){
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('user_active_error', 'Please confirm your email address');
            }elseif (Auth::user()->account_status == 3){
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('user_active_error', 'Your account has been blocked. Please connect with support.');
            }else{
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('user_active_error', 'Your account has been inactive . Please connect with support');
            }
        }

    }
}
