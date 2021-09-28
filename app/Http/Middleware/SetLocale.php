<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
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
        $languages = ['en','ru','uz'];

        if (in_array($request->lang,$languages)){
            App::setLocale($request->lang);
        }else{
            abort(404);
        }

        return $next($request);
    }
}

