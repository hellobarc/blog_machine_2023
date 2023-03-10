<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $session_data = auth()->user();
        $session_role = $session_data->role_id;
        if($session_role == 1)
        {
            return $next($request);
        }else{
            // return redirect()->route('login');
            return response()->json(
                [
                    'status' => "unauthorized",
                    'message' => "Your are not access this page",
                ]);
        }
       
    }
}
