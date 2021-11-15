<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
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
