<?php

namespace App\Http\Middleware;

use App\Models\Branch;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role_user = DB::table('role_user')->where('user_id',Auth::user()->id)->select('role_id')->first();
        if ($role_user->role_id != User::USER){
            return $next($request);
        }else{
            abort(404);
        }
    }
}
